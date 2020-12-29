<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        @font-face {
            font-family: 'Sofia Pro Light';
            src: url("{{ storage_path('fonts/SofiaProLight.ttf') }}") format('truetype'),
            url("{{ storage_path('fonts/SofiaProLight.ttf') }}") format('truetype');
            font-weight: 300;
            font-style: normal;
        }

        @font-face {
            font-family: 'Sofia Pro Medium';
            src: url("{{storage_path('fonts/SofiaProMedium.ttf') }}") format('truetype'),
            url("{{storage_path('fonts/SofiaProMedium.ttf') }}") format('truetype');
            font-weight: 500;
            font-style: normal;
        }

        @font-face {
            font-family: 'Sofia Pro Regular';
            src: url("{{storage_path('fonts/SofiaProRegular.ttf') }}") format('truetype'),
            url("{{storage_path('fonts/SofiaProRegular.ttf') }}") format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @page {
            margin: 4.54cm 0 4.54cm 0;
        }

        p, ol, ul, li{
            font-family: 'Sofia Pro Light'!important;
            font-size: 95%
        }
        h1,h2,h3,h4,h5,h6{
            font-family: 'Sofia Pro Medium'!important;
        }
    </style>
</head>
<body>
    @if($header_footer)
    <header
        style="opacity: 1; position: fixed; top: -4.54cm;left: 0px;height: 20px; width: 100%;padding: 5rem 6rem 0 6rem; margin-bottom: 6rem">
        <img style="width: 100%"
            src="{{ $header }}">
    </header>
    <footer style="position: fixed;bottom: -4.54cm;left: 0px;height: 156px;">
        <img style="width: 100%; opacity: 1" src="{{ $footer }}" alt="">
    </footer>
    @else
    <header
        style="opacity: 0; position: fixed; top: -4.54cm;left: 0px;height: 20px; width: 100%;padding: 5rem 6rem 0 6rem; margin-bottom: 6rem">
        <img style="width: 100%"
            src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48c3ZnIHdpZHRoPSI0NTBweCIgaGVpZ2h0PSIzN3B4IiB2aWV3Qm94PSIwIDAgNDUwIDM3IiB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPiAgICAgICAgPHRpdGxlPmhlYWRlcjwvdGl0bGU+ICAgIDxkZXNjPkNyZWF0ZWQgd2l0aCBTa2V0Y2guPC9kZXNjPiAgICA8ZGVmcz4gICAgICAgIDxwb2x5Z29uIGlkPSJwYXRoLTEiIHBvaW50cz0iNC41IDkgOCAxNiAxIDE2Ij48L3BvbHlnb24+ICAgIDwvZGVmcz4gICAgPGcgaWQ9IlBhZ2UtMSIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+ICAgICAgICA8ZyBpZD0iaGVhZGVyIj4gICAgICAgICAgICA8ZyBpZD0ibG9nby1jb2xvciIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDIxLjAwMDAwMCwgNC4wMDAwMDApIiBmaWxsPSIjMjQzNzc4Ij4gICAgICAgICAgICAgICAgPGcgaWQ9IkxvZ28tQ29weSI+ICAgICAgICAgICAgICAgICAgICA8cGF0aCBkPSJNNy45MDkwOTA5MSwwIEwxNi4xNTUwMTYyLDAgTDI5LDI5IEwyMC43NTQwNzQ3LDI5IEw3LjkwOTA5MDkxLDAgWiBNNi41ODk0MTk2MiwxNS44MTgxODE4IEwxMy4xODE4MTgyLDI5IEwwLDI5IEw2LjU4OTQxOTYyLDE1LjgxODE4MTggWiIgaWQ9IkNvbWJpbmVkLVNoYXBlIj48L3BhdGg+ICAgICAgICAgICAgICAgIDwvZz4gICAgICAgICAgICA8L2c+ICAgICAgICAgICAgPGcgaWQ9IkFudGlncmF2aXR5LWJsdWUiPiAgICAgICAgICAgICAgICA8cGF0aCBkPSJNOC4zNzA3NzUzNiwzNyBMNi45MTkxMTQ1NiwzNyBDMy4wMzk3MDk5NywzNi42MTk0NTM1IDAsMzMuMTA4NzAzNCAwLDI4LjgyNzQwOTkgQzAsMjQuMjcyNzc0OSAzLjIyMTkwODc0LDIwLjYwMTgzMjUgNy42MTk0OTM3NCwyMC42MDE4MzI1IEMxMC4zNjcyNzU0LDIwLjYwMTgzMjUgMTIuMjgxMzY0OSwyMS42Mzk5MjkyIDEzLjY0NjQ2NTEsMjMuMzExNTk1MyBMMTEuMzE0OTYyNCwyNS45MDYyNjczIEMxMC40MDUyNzM3LDI0LjQyNjYwOTIgOS4yMTE0NDksMjMuODY5Mzg3MSA3LjgyNzYzMzI0LDIzLjg2OTM4NzEgQzUuNjI5NDA3ODgsMjMuODY5Mzg3MSAzLjg0NzQ2MTUyLDI2LjA3OTQ3MzQgMy44NDc0NjE1MiwyOC44Mjc0MDk5IEMzLjg0NzQ2MTUyLDMxLjUxODM3MDggNS42Mjk0MDc4OCwzMy43MDkwODUzIDcuODI3NjMzMjQsMzMuNzA5MDg1MyBDOS41MzM1ODMxNiwzMy43MDkwODUzIDExLjIyMDI1MDQsMzIuNTk0NjQxMiAxMS4yMjAyNTA0LDMwLjY1MzQ4MDEgTDcuNjE5NDkzNzQsMzAuNjUzNDgwMSBMNy42MTk0OTM3NCwyNy44NjY4MDAxIEwxNC44NDAyODk3LDI3Ljg2NjgwMDEgTDE0Ljg0MDI4OTcsMzEuMzA2OTkxMSBDMTQuMDU2NjEwNSwzNC45OTc0NTE5IDExLjIwOTExNzMsMzYuNzQxMDU1OCA4LjM3MDc3NTM2LDM3IFogTTUxLjM4ODkwNTYsMCBMNTEuMzg4OTA1NiwxNS44NTU3NTkyIEw0Ny44MjU1ODAxLDE1Ljg1NTc1OTIgTDQ3LjgyNTU4MDEsMCBMNTEuMzg4OTA1NiwwIFogTTQ1LjIxODQ0ODUsMCBMNDUuMjE4NDQ4NSwzLjE3MTI2NTc4IEw0MS41MDM2OTcyLDMuMTcxMjY1NzggTDQxLjUwMzY5NzIsMTUuODU1NzU5MiBMMzcuOTQwMzcxNiwxNS44NTU3NTkyIEwzNy45NDAzNzE2LDMuMTcxMjY1NzggTDM0LjIyNTYyMDMsMy4xNzEyNjU3OCBMMzQuMjI1NjIwMywwIEw0NS4yMTg0NDg1LDAgWiBNMzIuNTI4MTc3NCwwIEwzMi41MjgxNzc0LDE1Ljg1NTc1OTIgTDI4Ljk2NDg1MTgsMTUuODU1NzU5MiBMMjIuNzEwNDU4Myw2LjAxNTQ5MTIyIEwyMi43MTA0NTgzLDE1Ljg1NTc1OTIgTDE5LjE0NzY5OTksMTUuODU1NzU5MiBMMTkuMTQ3Njk5OSwwIEwyMi43MTA0NTgzLDAgTDI4Ljk2NDg1MTgsOS44NDAyNjc5NCBMMjguOTY0ODUxOCwwIEwzMi41MjgxNzc0LDAgWiBNMTcuNzMxNTU3MywyMC44OTAxMjk0IEwyMy4zMjI5NjY5LDIwLjg5MDEyOTQgQzI2LjIyMjc0MTUsMjAuODkwMTI5NCAyOC40MjA5NjY5LDIyLjQ4NTQ0ODEgMjguNDIwOTY2OSwyNS41OTg1OTg3IEMyOC40MjA5NjY5LDI3Ljk4MTg5MSAyNy4xMzI0MzAyLDI5LjU3NzIwOTcgMjUuMjE4MzQwOCwzMC4xOTE5NzcyIEwzMC42MDA0NzY3LDM2Ljc0NTg4ODUgTDI2LjA3MDc0ODYsMzYuNzQ1ODg4NSBMMjEuMjk0ODgyOCwzMC40ODAyNzQxIEwyMS4yOTQ4ODI4LDM2Ljc0NTg4ODUgTDE3LjczMTU1NzMsMzYuNzQ1ODg4NSBMMTcuNzMxNTU3MywyMC44OTAxMjk0IFogTTIxLjI5NDg4MjgsMjcuOTI0MzQ1NSBMMjEuNzExNzI5LDI3LjkyNDM0NTUgQzIzLjA1NzU0NjUsMjcuOTI0MzQ1NSAyNC42Njg3ODQ1LDI3LjgyODA1NjcgMjQuNjY4Nzg0NSwyNS44NDg3MjE5IEMyNC42Njg3ODQ1LDIzLjg2OTM4NzEgMjMuMDU3NTQ2NSwyMy43NzMwOTgyIDIxLjcxMTcyOSwyMy43NzMwOTgyIEwyMS4yOTQ4ODI4LDIzLjc3MzA5ODIgTDIxLjI5NDg4MjgsMjcuOTI0MzQ1NSBaIE0zNS4wNjI3MTU0LDM2Ljc0NTg4ODUgTDI4LjUwNDkwMzIsMjAuODkwMTI5NCBMMzIuNTIzMDczMiwyMC44OTAxMjk0IEwzNi40NjUyNDY3LDMxLjMwNjk5MTEgTDQwLjQwNzQyMDIsMjAuODkwMTI5NCBMNDQuNDI1MDIzLDIwLjg5MDEyOTQgTDM3Ljg2Nzc3OCwzNi43NDU4ODg1IEwzNS4wNjI3MTU0LDM2Ljc0NTg4ODUgWiBNNDYuNTA2NDE4LDI0LjA2MTM5NTEgTDQ2LjUwNjQxOCwyMC44OTAxMjk0IEw1Ny40OTkyNDYyLDIwLjg5MDEyOTQgTDU3LjQ5OTI0NjIsMjQuMDYxMzk1MSBMNTMuNzg0NDk0OSwyNC4wNjEzOTUxIEw1My43ODQ0OTQ5LDM2Ljc0NTg4ODUgTDUwLjIyMTE2OTMsMzYuNzQ1ODg4NSBMNTAuMjIxMTY5MywyNC4wNjEzOTUxIEw0Ni41MDY0MTgsMjQuMDYxMzk1MSBaIE01OC40MDA5OTUsMjAuODkwMTI5NCBMNjIuNjg0MDE4MiwyMC44OTAxMjk0IEw2NS45NDM5MjUyLDI1Ljk2MzgxMjggTDY5LjIwMzgzMjEsMjAuODkwMTI5NCBMNzMuNDg3NDIyNSwyMC44OTAxMjk0IEw2Ny43MjUzMDQ0LDI5LjYzNDc1NTIgTDY3LjcyNTMwNDQsMzYuNzQ1ODg4NSBMNjQuMTYyNTQ1OSwzNi43NDU4ODg1IEw2NC4xNjI1NDU5LDI5LjYzNDc1NTIgTDU4LjQwMDk5NSwyMC44OTAxMjk0IFogTTc2LjUxNzA3MTYsMzEuNzk3NTUxNiBDNzcuODk4NjE4OCwzMS43OTc1NTE2IDc5LDMyLjkxNDI3NDcgNzksMzQuMzE1MzA2NCBDNzksMzUuNjk0Njg3NCA3Ny44OTg2MTg4LDM2LjgxMDg0MDggNzYuNTE3MDcxNiwzNi44MTA4NDA4IEM3NS4xNTcwNzU2LDM2LjgxMDg0MDggNzQuMDU1Njk0MywzNS42OTQ2ODc0IDc0LjA1NTY5NDMsMzQuMzE1MzA2NCBDNzQuMDU1Njk0MywzMi45MTQyNzQ3IDc1LjE1NzA3NTYsMzEuNzk3NTUxNiA3Ni41MTcwNzE2LDMxLjc5NzU1MTYgWiIgaWQ9IkNsaXAtMiIgZmlsbD0iIzI0Mzc3OCI+PC9wYXRoPiAgICAgICAgICAgICAgICA8cG9seWdvbiBpZD0iQ2xpcC01IiBmaWxsPSIjMjQzNzc4IiBwb2ludHM9IjEwLjMwMSAwIDE3IDE2IDEyLjY5OSAxNiA2IDAiPjwvcG9seWdvbj4gICAgICAgICAgICAgICAgPG1hc2sgaWQ9Im1hc2stMiIgZmlsbD0id2hpdGUiPiAgICAgICAgICAgICAgICAgICAgPHVzZSB4bGluazpocmVmPSIjcGF0aC0xIj48L3VzZT4gICAgICAgICAgICAgICAgPC9tYXNrPiAgICAgICAgICAgICAgICA8dXNlIGlkPSJDbGlwLTgiIGZpbGw9IiMyNDM3NzgiIHhsaW5rOmhyZWY9IiNwYXRoLTEiPjwvdXNlPiAgICAgICAgICAgIDwvZz4gICAgICAgIDwvZz4gICAgPC9nPjwvc3ZnPg==">
    </header>
    <footer style="opacity: 0;position: fixed;bottom: -4.54cm;left: 0px;height: 156px;">
        <img style="width: 100%;" src="http://s3-ap-southeast-1.amazonaws.com/antigrvty/footer.png" alt="">
    </footer>
    @endif
    <div style="padding: 0 2.54cm">
        {!! $content !!}
    </div>    
</body>
</html>