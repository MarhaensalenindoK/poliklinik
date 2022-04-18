<!doctype html>
<html lang="en">

<head>
<title>Poliklinik</title>
<link rel="icon" href="{{ asset('images/logo-poliklinik.png') }}" type="image/x-icon">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="Oculux Bootstrap 4x admin is super flexible, powerful, clean &amp; modern responsive admin dashboard with unlimited possibilities.">
<meta name="keywords" content="admin template, Oculux admin template, dashboard template, flat admin template, responsive admin template, web app, Light Dark version">
<meta name="author" content="GetBootstrap, design by: puffintheme.com">

<style>
    .container {
        padding: 1rem 20rem;
    }
    table td {
        vertical-align:top;
    }

    .mt-0 {
        margin-top: 0px;
    }

    .d-flex {
        display: flex;
    }

    .border-1 {
        border-style: dashed;
    }

    .p-1 {
        padding: 1rem;
    }
</style>

</head>
<body class="">
    <div class="">
        <div class="border-1 p-1">
            <h2>Struk</h2>
            <table>
                <tbody>
                    <tr>
                        <td>
                            Name
                        </td>
                        <td>: {{ $medicalHistory['patient']['name'] }}</td>
                    </tr>
                    <tr>
                        <td>
                            NIK
                        </td>
                        <td>: {{ $medicalHistory['patient']['nik'] }}</td>
                    </tr>
                    <tr>
                        <td>
                            Allergic
                        </td>
                        <td>: {{ $medicalHistory['allergic'] }}</td>
                    </tr>
                    <tr>
                        <td>
                            Been Diagnosed
                        </td>
                        <td class="d-flex">
                            <div class="">:</div>
                            <div class="">
                                @if (count($medicalHistory['been_diagnosed']) > 5)
                                    @foreach ($medicalHistory['been_diagnosed'] as $item)
                                        @if ($loop->last)
                                            {{ $item }}.
                                        @else
                                            {{ $item }},
                                        @endif
                                    @endforeach
                                @else
                                <ul class="mt-0">
                                @foreach ($medicalHistory['been_diagnosed'] as $item)
                                    <li>
                                        {{ $item }}
                                    </li>
                                @endforeach
                                </ul>
                                @endif
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Hospitalization Surgery (reason)</td>
                        <td class="d-flex">
                            <div class="">:</div>
                            <div class="">
                                <ol class="mt-0">
                                    @foreach ($medicalHistory['hospitalization_surgery'] as $item)
                                        <li>
                                            Reason : <b>{{ $item['reason'] }}</b>
                                        </li>
                                    @endforeach
                                </ol>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Anamnesis</td>
                        <td>
                            : {{ $medicalHistory['anamnesis'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>Diagnosis</td>
                        <td>
                            : {{ $medicalHistory['diagnosis'] }}
                        </td>
                    </tr>
                    @php
                        $countPrice = 0
                    @endphp
                    @foreach ($medicalHistory['action'] as $action)
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <h5>
                                Tindakan / Action {{ $loop->iteration }}
                            </h5>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Medicine
                        </td>
                        <td>:
                            {{ $action['medicine']['name'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td>
                            : {{ $action['medicine']['price'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>Sigma</td>
                        <td>
                            : {{ $action['sigma'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>Dose</td>
                        <td>
                            : {{ $action['count'] }} {{ $action['medicine']['amount'] }}
                        </td>
                    </tr>
                    <tr>
                        <td>Total harga obat {{ $action['medicine']['name'] }}</td>
                        <td>
                            : <strong>{{ $action['medicine']['price'] * $action['count'] }}</strong>
                        </td>
                    </tr>
                    @php
                        $countPrice += $action['medicine']['price'] * $action['count']
                    @endphp
                    @endforeach
                    <tr>
                        <td>
                            <strong>Total Harga</strong>
                        </td>
                        <td>:
                            <strong>{{ $countPrice }}</strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
