<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Cosec | @yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href={{ url('/assets/img/favicon.png') }} rel="icon">
    <link href={{ url('/assets/img/apple-touch-icon.png') }} rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <style type="text/css">
        :root {
            --theme-color: #ffffff;
            --white: #ffffff;
            --black: #000000;
        }

        body {
            font-family: 'Lato', sans-serif;
        }

        p,
        li,
        ul,
        ol {
            margin: 0;
            padding: 0;
            list-style: none;
            line-height: 1.5;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table tr th {
            padding: 0.75rem;
            text-align: left;
        }

        table tr td {
            padding: 0.75rem;
            text-align: left;
        }

        table th small {
            display: block;
            font-size: 12px;
        }

        .preview-main {
            max-width: 700px;
            width: 100%;
            margin: 0 auto;
            background: #ffff;
            box-shadow: 0 0 10px #ddd;
        }

        .logo {
            max-width: 200px;
            width: 100%;
        }

        .header table td {
            padding: 15px 30px;
        }

        .text-right {
            text-align: right;
        }

        .no-space tr td {
            padding: 0;
            white-space: nowrap;
        }


        .vertical-align-top td {
            vertical-align: top;
        }

        .view-qrcode {
            max-width: 139px;
            height: 139px;
            width: 100%;
            margin-left: auto;
            margin-top: 15px;
            background: var(--white);
            padding: 13px;
            border-radius: 10px;
        }

        .view-qrcode img {
            width: 100%;
            height: 100%;
        }

        .body {
            padding: 30px 25px 0;
        }



        table.add-border tr {
            border-top: 1px solid var(--theme-color);
        }

        tfoot tr:first-of-type {
            border-bottom: 1px solid var(--theme-color);
        }

        .total-table tr:first-of-type td {
            padding-top: 0;
        }

        .total-table tr:first-of-type {
            border-top: 0;
        }

        .sub-total {
            padding-right: 0;
            padding-left: 0;
        }

        .border-0 {
            border: none !important;
        }

        .summary td,
        .summary th {
            font-size: 13px;
            font-weight: 600;
        }

        .total-table td:last-of-type {
            width: 146px;
        }

        .footer {
            padding: 15px 20px;
        }

        .itm-description td {
            padding-top: 0;
        }

        html[dir="rtl"] table tr td,
        html[dir="rtl"] table tr th {
            text-align: right;
        }

        html[dir="rtl"] .text-right {
            text-align: left;
        }

        html[dir="rtl"] .view-qrcode {
            margin-left: 0;
            margin-right: auto;
        }
    </style>

    @yield('head')
    @stack('head')
</head>

<body>
    <div class="preview-main" id="boxes">
        <div class="header" style="background: @yield('color', '#ffffff') ;color:black">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <img class="logo" src="@yield('logo', 'https://demo.workdo.io/erpgo-saas/storage/proposal_logo/2_proposal_logo.png')" alt="">
                        </td>
                        <td class="text-right">
                            <h3 style="text-transform: uppercase; font-size: 40px; font-weight: bold;">@yield('title')
                            </h3>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table class="vertical-align-top">
                <tbody>
                    <tr>
                        <td>
                            <p>
                                Global Exports<br>
                                test@example.com<br>
                                114 New Mexico 371 <br> Wilmington, New York - 87323 <br>United States (505)
                                862-7112<br>
                                Registration Number : 8612783412312 <br>
                                GST Number : GSTERPGO8236234234544 <br> </p>
                        </td>
                        <td>
                            @yield('about-document')
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="body">
            <table>
                <tbody>
                    <tr>
                        <td>
                            <strong style="margin-bottom: 10px; display:block;">Bill To:</strong>
                            @yield('bill-to')
                        </td>
                        <td class="text-right">
                            <strong style="margin-bottom: 10px; display:block;">Ship To:</strong>
                            @yield('bill-to')
                        </td>
                    </tr>
                    @hasSection('document-status')
                        <tr>
                            <td><strong>Invoice Status : </strong>@yield('document-status')</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <table class="add-border summary" style="margin-top: 30px;">
                <thead style="background: @yield('color', '#ffffff') ;color:black">
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Discount</th>
                        <th>Tax (%)</th>
                        <th>Price <small>after tax &amp; discount</small></th>
                    </tr>
                </thead>
                @yield('summary-body')
                @yield('summary-footer')
            </table>
            <div class="footer">
                <b>Payment Terms And Conditions</b> <br>
                <span
                    style="color: rgb(29, 28, 29); font-family: Slack-Lato, Slack-Fractions, appleLogo, sans-serif; font-size: 15px; font-variant-ligatures: common-ligatures; background-color: rgb(248, 248, 248);">Customer
                    is eligible for 1% discount if payment is received within 10 days. Full payment is required after 10
                    days and the overall due date is 30 days from the invoice date.</span>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('script')
    @stack('script')
</body>

</html>
