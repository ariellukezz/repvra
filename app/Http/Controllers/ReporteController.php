<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;

class ReporteController extends Controller
{
    public function generatePDF($p)
    {
        $datos = DB::select("
            WITH cursos_filtrados AS (
                SELECT *
                FROM cursos
                WHERE prog_id IN ($p)
            )
            SELECT 
                grupos_y_ciclos.grupo_valor,
                ciclos.ciclo_valor,
                IFNULL(count1, 0) AS num_cursos,
                IFNULL(count2, 0) AS num_horas
            FROM 
                (SELECT 'A' as grupo_valor UNION ALL
                SELECT 'B' UNION ALL
                SELECT 'C' UNION ALL
                SELECT 'D' UNION ALL
                SELECT 'E' UNION ALL
                SELECT 'F' UNION ALL
                SELECT 'U' UNION ALL
                SELECT 'V' UNION ALL
                SELECT 'W' UNION ALL
                SELECT 'X' UNION ALL
                SELECT 'Y' UNION ALL
                SELECT 'Z' UNION ALL
                SELECT 'DIRIGIDO' UNION ALL
                SELECT 'RE' UNION ALL
                SELECT 'UNICO') AS grupos_y_ciclos
            CROSS JOIN
                (SELECT 1 as ciclo_valor UNION ALL
                SELECT 2 UNION ALL
                SELECT 3 UNION ALL
                SELECT 4 UNION ALL
                SELECT 5 UNION ALL
                SELECT 6 UNION ALL
                SELECT 7 UNION ALL
                SELECT 8 UNION ALL
                SELECT 9 UNION ALL
                SELECT 10 UNION ALL
                SELECT 11 UNION ALL
                SELECT 12 UNION ALL
                SELECT 13 UNION ALL
                SELECT 14) AS ciclos
            LEFT JOIN
                (SELECT 
                    g.grupo AS grupo_valor,
                    c.curso_ciclo AS ciclo_valor,
                    COUNT(*) AS count1
                FROM 
                    cursos_filtrados c
                INNER JOIN 
                    grupo g ON c.curso_id=g.curso_id
                INNER JOIN 
                    grupo_curso gc ON g.grupo_id=gc.cursogc_id
                INNER JOIN 
                    program p ON c.prog_id = p.prog_id
                GROUP BY 
                    g.grupo, c.curso_ciclo) AS count1_table 
            ON 
                grupos_y_ciclos.grupo_valor = count1_table.grupo_valor
                AND ciclos.ciclo_valor = count1_table.ciclo_valor
            LEFT JOIN
                (SELECT 
                    g.grupo AS grupo_valor,
                    c.curso_ciclo AS ciclo_valor,
                    COUNT(*) AS count2
                FROM 
                    cursos_filtrados c
                INNER JOIN 
                    grupo g ON c.curso_id=g.curso_id
                INNER JOIN 
                    grupo_curso gc ON g.grupo_id=gc.cursogc_id
                INNER JOIN 
                    horario h ON gc.gc_id=h.gch_id
                INNER JOIN 
                    program p ON c.prog_id = p.prog_id
                GROUP BY 
                    g.grupo, c.curso_ciclo) AS count2_table 
            ON 
                grupos_y_ciclos.grupo_valor = count2_table.grupo_valor
                AND ciclos.ciclo_valor = count2_table.ciclo_valor
            WHERE
                count1 IS NOT NULL OR count2 IS NOT NULL
            ORDER BY ciclo_valor;
        ");

        $data = [];

        // Procesar los datos y agruparlos por ciclo_valor
        foreach ($datos as $dato) {
            $ciclo_valor = $dato->ciclo_valor;
    
            // Verificar si el ciclo_valor ya existe en el array
            $indice = array_search($ciclo_valor, array_column($data, 'ciclo_valor'));
    
            // Si el ciclo_valor no existe en el array, agregar un nuevo objeto
            if ($indice === false) {
                $data[] = [
                    "ciclo_valor" => $ciclo_valor,
                    "datos" => [
                        [
                            "grupo_valor" => $dato->grupo_valor,
                            "num_cursos" => $dato->num_cursos,
                            "num_horas" => $dato->num_horas
                        ]
                    ]
                ];
            } else {
                // Si el ciclo_valor ya existe, agregar datos al objeto existente
                $data[$indice]["datos"][] = [
                    "grupo_valor" => $dato->grupo_valor,
                    "num_cursos" => $dato->num_cursos,
                    "num_horas" => $dato->num_horas
                ];
            }
        }
    
        // return $data;

        $pdf = PDF::loadView('pdf.template', compact('data'));
        return $pdf->stream('pdf_example.pdf');
    }
}
