<!DOCTYPE html>
<head>
<style>
    *{
        font-family: 'helvetica';
        font-style: normal;
        font-weight: normal;
        src: url('https://fonts.gstatic.com/s/opensans/v18/mem8YaGs126MiZpBA-UFWJ0bbck.woff2') format('woff2');
    }
    .tabla-c1 {
    border-collapse: collapse;
    width: 100%;
    }

    .tabla-c1 th, .tabla-c1 td {
        border: 1px solid #dddddd;
        padding: 8px;
        text-align: left;
    }

    .tabla-c1 tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .tabla-c1 tr:hover {
        background-color: #dddddd;
    }
</style>
</head>

<body>
    <div style="width: 100%; text-align:left; font-size:9pt;"> 
        <div>UNIVERSIDAD NACIONAL DEL ALTIPLANO</div>
        <div>VICERRECTORADO ACADÉMIO</div>
    </div>

    <div style="width: 100%; text-align:left; text-align:center; margin-top:16px;"> 
        <div><strong style="font-size: 11pt; font-weight:700;">EVALUACIÓN DE LA DISTRIBUCIÓN DE CARGA</strong></div>
    </div>

    <table style="width: 100%; font-size:10pt; margin-top:15px;">
        <tr>
            <td colspan="2">FACULTAD:</td>
        </tr>
        <tr>
            <td>ESCUELA PROFESIONAL: </td>
            <td>PROGRAMA DE ESTUDIOS:</td>
        </tr>
        <tr>
            <td>AÑO Y SEMESTRE ACADÉMICO</td>
            <td>N° DE ESTUDIANTES MATRICULADOS</td>
        </tr>
    </table>

    <div style="font-size: 8pt; margin-top:15px;">PROGRAMADO</div>
    <table class="tabla-c1" style="width: 100%; font-size:8pt; ">

        <tr>
            <th style="border: 1px solid grey;" rowspan="2"><div style="text-align: center;">Ciclo </div></th>
            <th style="border: 1px solid grey;" colspan="2"><div style="text-align: center;">Grupo A </div></th>
            <th style="border: 1px solid grey;" colspan="2"><div style="text-align: center;">Grupo B </div></th>
            <th style="border: 1px solid grey;" colspan="2"><div style="text-align: center;">Grupo Unico (U) </div></th>
            <th style="border: 1px solid grey;" colspan="2"><div style="text-align: center;">Grupo C/D/E </div></th>
            <th style="border: 1px solid grey;" colspan="2"><div style="text-align: center;">Grupo Dirigido / R.E. </div></th>
        </tr>
        <tr>
            <th style="border: 1px solid grey;">N° Cursos</th>
            <th style="border: 1px solid grey;">N° Horas</th>
            <th style="border: 1px solid grey;">N° Cursos</th>
            <th style="border: 1px solid grey;">N° Horas</th>
            <th style="border: 1px solid grey;">N° Cursos</th>
            <th style="border: 1px solid grey;">N° Horas</th>
            <th style="border: 1px solid grey;">N° Cursos</th>
            <th style="border: 1px solid grey;">N° Horas</th>
            <th style="border: 1px solid grey;">N° Cursos</th>
            <th style="border: 1px solid grey;">N° Horas</th>
        </tr>

        @php
            $a_cursos = 0;
            $a_horas = 0;
            $b_cursos = 0;
            $b_horas = 0;
            $unico_cursos = 0;
            $unico_horas = 0;
            $otros_cursos = 0;
            $otros_horas = 0;
            $dirigido_cursos = 0;
            $dirigido_horas = 0;
        @endphp

        @foreach($data as $dato)


        <tr>
            @php
                $datoss = range(1, 10); 
            @endphp
            <td><div style="text-align: center">{{ convertirARomano($dato['ciclo_valor']) }}</div></td>

            @foreach($datoss as $key=>$item)
                @if($key == 0)
                    @if(buscarLetraA( $dato['datos'], 'A') == 99 )
                        <td></td>
                    @else
                        <td><div style="text-align: center"> {{ $dato['datos'][buscarLetraA( $dato['datos'], 'A')]['num_cursos'] }} </div></td>
                        @php  $a_cursos += $dato['datos'][buscarLetraA( $dato['datos'], 'A')]['num_cursos']; @endphp
                    @endif
                @endif 
                @if($key == 1)
                    @if(buscarLetraA( $dato['datos'], 'A') == 99 )
                        <td></td>
                    @else
                        <td> <div style="text-align: center"> {{ $dato['datos'][buscarLetraA( $dato['datos'], 'A')]['num_horas'] }} </div></td>
                        @php  $a_horas += $dato['datos'][buscarLetraA( $dato['datos'], 'A')]['num_horas']; @endphp
                    @endif
                @endif    
                @if($key == 2)
                    @if(buscarLetraA( $dato['datos'], 'B') == 99 )
                        <td></td>
                    @else
                        <td> <div style="text-align: center"> {{ $dato['datos'][buscarLetraA( $dato['datos'], 'B')]['num_cursos'] }} </div></td>
                        @php  $b_cursos += $dato['datos'][buscarLetraA( $dato['datos'], 'B')]['num_cursos']; @endphp
                    @endif
                @endif 
                @if($key == 3)
                    @if(buscarLetraA( $dato['datos'], 'B') == 99 )
                        <td></td>
                    @else
                        <td><div style="text-align: center"> {{ $dato['datos'][buscarLetraA( $dato['datos'], 'B')]['num_horas'] }} </div></td>
                        @php  $b_horas += $dato['datos'][buscarLetraA( $dato['datos'], 'B')]['num_horas']; @endphp
                    @endif
                @endif    
                @if($key == 4)
                    @if(buscarLetraA( $dato['datos'], 'UNICO') == 99 )
                        <td></td>
                    @else
                        <td><div style="text-align: center"> {{ $dato['datos'][buscarLetraA( $dato['datos'], 'UNICO')]['num_cursos'] }} </div></td>
                        @php  $unico_cursos += $dato['datos'][buscarLetraA( $dato['datos'], 'UNICO')]['num_cursos']; @endphp
                        
                    @endif
                @endif 
                @if($key == 5)
                    @if(buscarLetraA( $dato['datos'], 'UNICO') == 99 )
                        <td></td>
                    @else
                        <td><div style="text-align: center"> {{ $dato['datos'][buscarLetraA( $dato['datos'], 'UNICO')]['num_horas'] }} </div></td>
                        @php  $unico_horas += $dato['datos'][buscarLetraA( $dato['datos'], 'UNICO')]['num_horas']; @endphp
                    @endif
                @endif 
                
                @if($key == 6)
                    @php
                        $buscarC = buscarLetraA($dato['datos'], 'C') == 99;
                        $buscarD = buscarLetraA($dato['datos'], 'D') == 99;
                        $buscarE = buscarLetraA($dato['datos'], 'E') == 99;
                    @endphp
                
                    @if($buscarC != 99)
                        <td><div style="text-align: center"> {{ $dato['datos'][buscarLetraA( $dato['datos'], 'C')]['num_cursos'] }} </div></td>
                        @php  $otros_cursos += $dato['datos'][buscarLetraA( $dato['datos'], 'C')]['num_cursos']; @endphp
                    @else
                        @if($buscarD != 99)
                            <td><div style="text-align: center"> {{ $dato['datos'][buscarLetraA( $dato['datos'], 'D')]['num_cursos'] }} </div></td>
                            @php  $otros_cursos += $dato['datos'][buscarLetraA( $dato['datos'], 'D')]['num_cursos']; @endphp
                        @else
                            @if($buscarE != 99)
                                <td><div style="text-align: center"> {{ $dato['datos'][buscarLetraA( $dato['datos'], 'E')]['num_cursos'] }} </div></td>
                                @php  $otros_cursos += $dato['datos'][buscarLetraA( $dato['datos'], 'E')]['num_cursos']; @endphp
                            @else
                                <td></td>
                            @endif
                        @endif
                    @endif
                @endif

                @if($key == 7)
                    @php
                        $buscarC = buscarLetraA($dato['datos'], 'C') == 99;
                        $buscarD = buscarLetraA($dato['datos'], 'D') == 99;
                        $buscarE = buscarLetraA($dato['datos'], 'E') == 99;
                    @endphp
                
                    @if($buscarC != 99)
                        <td><div style="text-align: center"> {{ $dato['datos'][buscarLetraA( $dato['datos'], 'C')]['num_horas'] }} </div></td>
                        @php  $otros_horas += $dato['datos'][buscarLetraA( $dato['datos'], 'C')]['num_horas']; @endphp
                    @else
                        @if($buscarD != 99)
                            <td><div style="text-align: center"> {{ $dato['datos'][buscarLetraA( $dato['datos'], 'D')]['num_horas'] }} </div></td>
                            @php  $otros_horas += $dato['datos'][buscarLetraA( $dato['datos'], 'D')]['num_horas']; @endphp
                        @else
                            @if($buscarE != 99)
                                <td><div style="text-align: center"> {{ $dato['datos'][buscarLetraA( $dato['datos'], 'E')]['num_horas'] }} </div></td>
                                @php  $otros_horas += $dato['datos'][buscarLetraA( $dato['datos'], 'E')]['num_horas']; @endphp
                            @else
                                <td></td>
                            @endif
                        @endif
                    @endif
                @endif

                @if($key == 8)
                    @php
                        $buscarDIRIGIDO = buscarLetraA($dato['datos'], 'DIRIGIDO') == 99;
                        $buscarRE = buscarLetraA($dato['datos'], 'RE') == 99;
                    @endphp
                
                    @if($buscarDIRIGIDO != 99)
                        <td><div style="text-align: center"> {{ $dato['datos'][buscarLetraA( $dato['datos'], 'DIRIGIDO')]['num_cursos'] }} </div></td>
                        @php  $dirigido_cursos += $dato['datos'][buscarLetraA( $dato['datos'], 'DIRIGIDO')]['num_cursos']; @endphp
                    @else
                        @if($buscarRE != 99)
                            <td><div style="text-align: center"> {{ $dato['datos'][buscarLetraA( $dato['datos'], 'RE')]['num_cursos'] }} </div></td>
                            @php  $dirigido_cursos += $dato['datos'][buscarLetraA( $dato['datos'], 'RE')]['num_cursos']; @endphp
                        @else
                            <td></td>
                        @endif
                    @endif
                @endif

                @if($key == 9)
                @php
                    $buscarDIRIGIDO = buscarLetraA($dato['datos'], 'DIRIGIDO') == 99;
                    $buscarRE = buscarLetraA($dato['datos'], 'RE') == 99;
                @endphp
            
                @if($buscarDIRIGIDO != 99)
                    <td><div style="text-align: center"> {{ $dato['datos'][buscarLetraA( $dato['datos'], 'DIRIGIDO')]['num_horas'] }} </div></td>
                    @php  $dirigido_horas += $dato['datos'][buscarLetraA( $dato['datps'], 'DIRIGIDO')]['num_horas']; @endphp
                @else
                    @if($buscarRE != 99)
                        <td><div style="text-align: center"> {{ $dato['datos'][buscarLetraA( $dato['datos'], 'RE')]['num_horas'] }} </div></td>
                        @php  $dirigido_horas += $dato['datos'][buscarLetraA( $dato['datos'], 'RE')]['num_horas']; @endphp
                    @else
                        <td></td>
                    @endif
                @endif
            @endif


            @endforeach
        </tr>
    @endforeach

    <tr>
        <td><div style="font-weight: bold; text-align: center; ">Total</div></td>
        <td><div style="font-weight: bold; text-align: center; ">{{$a_cursos }} </div></td>
        <td><div style="font-weight: bold; text-align: center; ">{{$a_horas }} </div></td>
        <td><div style="font-weight: bold; text-align: center; ">{{$b_cursos }} </div></td>
        <td><div style="font-weight: bold; text-align: center; ">{{$b_horas }} </div></td>
        <td><div style="font-weight: bold; text-align: center; ">{{$unico_cursos }} </div></td>
        <td><div style="font-weight: bold; text-align: center; ">{{$unico_horas }} </div></td>
        <td><div style="font-weight: bold; text-align: center; ">{{$otros_cursos }} </div></td>
        <td><div style="font-weight: bold; text-align: center; ">{{$otros_horas }} </div></td>
        <td><div style="font-weight: bold; text-align: center; ">{{$dirigido_cursos }} </div></td>
        <td><div style="font-weight: bold; text-align: center; ">{{$dirigido_horas }} </div></td>
    </tr>



    </table>














    <table class="tabla-c1" style="width: 500px; font-size:8pt; margin-top:20px;">

        <tr>
            <th style="border: 1px solid grey;"><div style="text-align: center;">Resumen </div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">N° Cursos </div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">N° Horas</div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">% Cursos</div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">% Horas</div></th>
        </tr>
        <tr>
            <td style="border: 1px solid grey;"></td>
            <td style="border: 1px solid grey;"></td>
            <td style="border: 1px solid grey;"></td>
            <td style="border: 1px solid grey;"></td>
            <td style="border: 1px solid grey;"></td>
        </tr>
    </table>







    <div style="font-size: 8pt; margin-top:15px;">CATEGORIA PRINCIPALES</div>
    <table class="tabla-c1" style="width: 580px; font-size:8pt; ">

        <tr>
            <th style="border: 1px solid grey;"><div style="text-align: center;">N° Docentes </div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">Decano</div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">Autoridades</div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">Inv. Renacyt</div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">N° Cursos</div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">N° Horas</div></th>
            <th style="border: 1px solid grey;" colspan="2"><div style="text-align: center;">Promedio</div></th>
        </tr>
        <tr>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
        </tr>
    </table>




    <div style="font-size: 8pt; margin-top:15px;">CATEGORIA ASOCIADOS</div>
    <table class="tabla-c1" style="width: 550px; font-size:8pt; ">

        <tr>
            <th style="border: 1px solid grey;"><div style="text-align: center;">N° Docentes </div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">Decano</div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">Autoridades</div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">Inv. Renacyt</div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">N° Cursos</div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">N° Horas</div></th>
            <th style="border: 1px solid grey;" colspan="2"><div style="text-align: center;">Promedio</div></th>
        </tr>
        <tr>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
        </tr>
    </table>








    <div style="font-size: 8pt; margin-top:15px;">CATEGORIA AUXILIARES</div>
    <table class="tabla-c1" style="width: 550px;; font-size:8pt; ">

        <tr>
            <th style="border: 1px solid grey;"><div style="text-align: center;">N° Docentes </div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">Decano</div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">Autoridades</div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">Inv. Renacyt</div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">N° Cursos</div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">N° Horas</div></th>
            <th style="border: 1px solid grey;" colspan="2"><div style="text-align: center;">Promedio</div></th>
        </tr>
        <tr>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
        </tr>
    </table>








    <div style="font-size: 8pt; margin-top:15px;">PLAZAS DE CONTRATO</div>
    <table class="tabla-c1" style="width: 550px;; font-size:8pt; ">

        <tr>
            <th style="border: 1px solid grey;"><div style="text-align: center;">Contrato</div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">N° Docentes </div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">N° Cursos</div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">N° Horas</div></th>
            <th style="border: 1px solid grey;" colspan="2"><div style="text-align: center;">Promedio</div></th>
        </tr>
        <tr>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
        </tr>
    </table>



    <div style="font-size: 8pt; margin-top:15px;">DOCENTES SERVICIO</div>
    <table class="tabla-c1" style="width: 350px; font-size:8pt; ">
        <tr>
            <th style="border: 1px solid grey;"><div style="text-align: center;">N° Docentes </div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">N° Cursos</div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;">Horas</div></th>
        </tr>
        <tr>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
            <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
        </tr>
    </table>


    <table>
        <tr>
            <td style="width: 350px">   
                <div style="font-size: 10pt;">DISTRIBUCION REALIZADA</div>     
                <table class="tabla-c1" style="width: 280px; font-size:8pt; ">
                    <tr>
                        <th style="border: 1px solid grey;"><div style="text-align: center;">N° Cursos</div></th>
                        <th style="border: 1px solid grey;"><div style="text-align: center;">N° Horas </div></th>
                    </tr>
                    <tr>
                        <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
                        <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
                    </tr>
                </table>
            </td>
            <td style="width: 350px">   
                <div style="font-size: 10pt;">DIFICIT DE DOCENTES</div>
                <table class="tabla-c1" style="width: 280px; font-size:8pt; ">
                    <tr>
                        <th style="border: 1px solid grey;"><div style="text-align: center;">N° Cursos</div></th>
                        <th style="border: 1px solid grey;"><div style="text-align: center;">N° Horas </div></th>
                    </tr>
                    <tr>
                        <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
                        <th style="border: 1px solid grey;"><div style="text-align: center;"></div></th>
                    </tr>
                </table>

            </td>

        </tr>



    </table>














    

    @php
        function convertirARomano($numero)
        {
            $romanos = [
                1 => 'I',
                2 => 'II',
                3 => 'III',
                4 => 'IV',
                5 => 'V',
                6 => 'VI',
                7 => 'VII',
                8 => 'VIII',
                9 => 'IX',
                10 => 'X'
            ];

            return $romanos[$numero];
        }


        function buscarLetraA($array, $valor_buscado)
        {
            foreach($array as $k=>$item2){
                if($item2['grupo_valor'] === $valor_buscado){
                    return $k;
                }
            }
            return 99;

        }
    @endphp


</body>