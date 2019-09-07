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
            margin: 12rem 0 8rem 0;
        }

        .wadah {
            font-size: 75%;
            text-align: justify;
            padding: 0 6rem;
            font-family: 'Sofia Pro Light';
        }

        .page-break-before {
            page-break-before: always;
            page-break-inside: avoid;
            clear: both;
        }

        .pasal {
            text-align: center;
            font-family: 'Sofia Pro Medium';
        }

        .sub-pasal {
            text-align: center;
            font-family: 'Sofia Pro Medium';
            margin-bottom: 20px;
        }

        .pihak {
            font-family: 'Sofia Pro Medium';
            text-decoration: underline
        }

        .judul {
            font-size: 14px;
            text-align: center;
            font-family: 'Sofia Pro Medium';
        }

        .no-surat {
            font-size: 13px;
            text-align: center;
            font-family: 'Sofia Pro Medium';
        }

        .bld {
            font-family: 'Sofia Pro Medium';
        }

        li {
            padding-left: 25px;
            margin-bottom: 10px
        }

        ol {
            margin-bottom: 25px;
        }

        .mt-3 {
            margin-top: 1rem;
        }

        .mt-4 {
            margin-top: 1.5rem;
        }

        .mb-5 {
            margin-bottom: 2.8rem;
        }

        .mb-2 {
            margin-bottom: 1.5rem;
        }

        .mt-5 {
            margin-top: 6rem;
        }

        .brk {
            page-break-after: always;
        }

    </style>
</head>

<body>

    @if($header_footer)
    <header
        style="opacity: 1; position: fixed; top: -12rem;left: 0px;height: 20px; width: 100%;padding: 5rem 6rem 0 6rem; margin-bottom: 6rem">
        <img style="width: 100%"
            src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48c3ZnIHdpZHRoPSI0NTBweCIgaGVpZ2h0PSIzN3B4IiB2aWV3Qm94PSIwIDAgNDUwIDM3IiB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPiAgICAgICAgPHRpdGxlPmhlYWRlcjwvdGl0bGU+ICAgIDxkZXNjPkNyZWF0ZWQgd2l0aCBTa2V0Y2guPC9kZXNjPiAgICA8ZGVmcz4gICAgICAgIDxwb2x5Z29uIGlkPSJwYXRoLTEiIHBvaW50cz0iNC41IDkgOCAxNiAxIDE2Ij48L3BvbHlnb24+ICAgIDwvZGVmcz4gICAgPGcgaWQ9IlBhZ2UtMSIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+ICAgICAgICA8ZyBpZD0iaGVhZGVyIj4gICAgICAgICAgICA8ZyBpZD0ibG9nby1jb2xvciIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDIxLjAwMDAwMCwgNC4wMDAwMDApIiBmaWxsPSIjMjQzNzc4Ij4gICAgICAgICAgICAgICAgPGcgaWQ9IkxvZ28tQ29weSI+ICAgICAgICAgICAgICAgICAgICA8cGF0aCBkPSJNNy45MDkwOTA5MSwwIEwxNi4xNTUwMTYyLDAgTDI5LDI5IEwyMC43NTQwNzQ3LDI5IEw3LjkwOTA5MDkxLDAgWiBNNi41ODk0MTk2MiwxNS44MTgxODE4IEwxMy4xODE4MTgyLDI5IEwwLDI5IEw2LjU4OTQxOTYyLDE1LjgxODE4MTggWiIgaWQ9IkNvbWJpbmVkLVNoYXBlIj48L3BhdGg+ICAgICAgICAgICAgICAgIDwvZz4gICAgICAgICAgICA8L2c+ICAgICAgICAgICAgPGcgaWQ9IkFudGlncmF2aXR5LWJsdWUiPiAgICAgICAgICAgICAgICA8cGF0aCBkPSJNOC4zNzA3NzUzNiwzNyBMNi45MTkxMTQ1NiwzNyBDMy4wMzk3MDk5NywzNi42MTk0NTM1IDAsMzMuMTA4NzAzNCAwLDI4LjgyNzQwOTkgQzAsMjQuMjcyNzc0OSAzLjIyMTkwODc0LDIwLjYwMTgzMjUgNy42MTk0OTM3NCwyMC42MDE4MzI1IEMxMC4zNjcyNzU0LDIwLjYwMTgzMjUgMTIuMjgxMzY0OSwyMS42Mzk5MjkyIDEzLjY0NjQ2NTEsMjMuMzExNTk1MyBMMTEuMzE0OTYyNCwyNS45MDYyNjczIEMxMC40MDUyNzM3LDI0LjQyNjYwOTIgOS4yMTE0NDksMjMuODY5Mzg3MSA3LjgyNzYzMzI0LDIzLjg2OTM4NzEgQzUuNjI5NDA3ODgsMjMuODY5Mzg3MSAzLjg0NzQ2MTUyLDI2LjA3OTQ3MzQgMy44NDc0NjE1MiwyOC44Mjc0MDk5IEMzLjg0NzQ2MTUyLDMxLjUxODM3MDggNS42Mjk0MDc4OCwzMy43MDkwODUzIDcuODI3NjMzMjQsMzMuNzA5MDg1MyBDOS41MzM1ODMxNiwzMy43MDkwODUzIDExLjIyMDI1MDQsMzIuNTk0NjQxMiAxMS4yMjAyNTA0LDMwLjY1MzQ4MDEgTDcuNjE5NDkzNzQsMzAuNjUzNDgwMSBMNy42MTk0OTM3NCwyNy44NjY4MDAxIEwxNC44NDAyODk3LDI3Ljg2NjgwMDEgTDE0Ljg0MDI4OTcsMzEuMzA2OTkxMSBDMTQuMDU2NjEwNSwzNC45OTc0NTE5IDExLjIwOTExNzMsMzYuNzQxMDU1OCA4LjM3MDc3NTM2LDM3IFogTTUxLjM4ODkwNTYsMCBMNTEuMzg4OTA1NiwxNS44NTU3NTkyIEw0Ny44MjU1ODAxLDE1Ljg1NTc1OTIgTDQ3LjgyNTU4MDEsMCBMNTEuMzg4OTA1NiwwIFogTTQ1LjIxODQ0ODUsMCBMNDUuMjE4NDQ4NSwzLjE3MTI2NTc4IEw0MS41MDM2OTcyLDMuMTcxMjY1NzggTDQxLjUwMzY5NzIsMTUuODU1NzU5MiBMMzcuOTQwMzcxNiwxNS44NTU3NTkyIEwzNy45NDAzNzE2LDMuMTcxMjY1NzggTDM0LjIyNTYyMDMsMy4xNzEyNjU3OCBMMzQuMjI1NjIwMywwIEw0NS4yMTg0NDg1LDAgWiBNMzIuNTI4MTc3NCwwIEwzMi41MjgxNzc0LDE1Ljg1NTc1OTIgTDI4Ljk2NDg1MTgsMTUuODU1NzU5MiBMMjIuNzEwNDU4Myw2LjAxNTQ5MTIyIEwyMi43MTA0NTgzLDE1Ljg1NTc1OTIgTDE5LjE0NzY5OTksMTUuODU1NzU5MiBMMTkuMTQ3Njk5OSwwIEwyMi43MTA0NTgzLDAgTDI4Ljk2NDg1MTgsOS44NDAyNjc5NCBMMjguOTY0ODUxOCwwIEwzMi41MjgxNzc0LDAgWiBNMTcuNzMxNTU3MywyMC44OTAxMjk0IEwyMy4zMjI5NjY5LDIwLjg5MDEyOTQgQzI2LjIyMjc0MTUsMjAuODkwMTI5NCAyOC40MjA5NjY5LDIyLjQ4NTQ0ODEgMjguNDIwOTY2OSwyNS41OTg1OTg3IEMyOC40MjA5NjY5LDI3Ljk4MTg5MSAyNy4xMzI0MzAyLDI5LjU3NzIwOTcgMjUuMjE4MzQwOCwzMC4xOTE5NzcyIEwzMC42MDA0NzY3LDM2Ljc0NTg4ODUgTDI2LjA3MDc0ODYsMzYuNzQ1ODg4NSBMMjEuMjk0ODgyOCwzMC40ODAyNzQxIEwyMS4yOTQ4ODI4LDM2Ljc0NTg4ODUgTDE3LjczMTU1NzMsMzYuNzQ1ODg4NSBMMTcuNzMxNTU3MywyMC44OTAxMjk0IFogTTIxLjI5NDg4MjgsMjcuOTI0MzQ1NSBMMjEuNzExNzI5LDI3LjkyNDM0NTUgQzIzLjA1NzU0NjUsMjcuOTI0MzQ1NSAyNC42Njg3ODQ1LDI3LjgyODA1NjcgMjQuNjY4Nzg0NSwyNS44NDg3MjE5IEMyNC42Njg3ODQ1LDIzLjg2OTM4NzEgMjMuMDU3NTQ2NSwyMy43NzMwOTgyIDIxLjcxMTcyOSwyMy43NzMwOTgyIEwyMS4yOTQ4ODI4LDIzLjc3MzA5ODIgTDIxLjI5NDg4MjgsMjcuOTI0MzQ1NSBaIE0zNS4wNjI3MTU0LDM2Ljc0NTg4ODUgTDI4LjUwNDkwMzIsMjAuODkwMTI5NCBMMzIuNTIzMDczMiwyMC44OTAxMjk0IEwzNi40NjUyNDY3LDMxLjMwNjk5MTEgTDQwLjQwNzQyMDIsMjAuODkwMTI5NCBMNDQuNDI1MDIzLDIwLjg5MDEyOTQgTDM3Ljg2Nzc3OCwzNi43NDU4ODg1IEwzNS4wNjI3MTU0LDM2Ljc0NTg4ODUgWiBNNDYuNTA2NDE4LDI0LjA2MTM5NTEgTDQ2LjUwNjQxOCwyMC44OTAxMjk0IEw1Ny40OTkyNDYyLDIwLjg5MDEyOTQgTDU3LjQ5OTI0NjIsMjQuMDYxMzk1MSBMNTMuNzg0NDk0OSwyNC4wNjEzOTUxIEw1My43ODQ0OTQ5LDM2Ljc0NTg4ODUgTDUwLjIyMTE2OTMsMzYuNzQ1ODg4NSBMNTAuMjIxMTY5MywyNC4wNjEzOTUxIEw0Ni41MDY0MTgsMjQuMDYxMzk1MSBaIE01OC40MDA5OTUsMjAuODkwMTI5NCBMNjIuNjg0MDE4MiwyMC44OTAxMjk0IEw2NS45NDM5MjUyLDI1Ljk2MzgxMjggTDY5LjIwMzgzMjEsMjAuODkwMTI5NCBMNzMuNDg3NDIyNSwyMC44OTAxMjk0IEw2Ny43MjUzMDQ0LDI5LjYzNDc1NTIgTDY3LjcyNTMwNDQsMzYuNzQ1ODg4NSBMNjQuMTYyNTQ1OSwzNi43NDU4ODg1IEw2NC4xNjI1NDU5LDI5LjYzNDc1NTIgTDU4LjQwMDk5NSwyMC44OTAxMjk0IFogTTc2LjUxNzA3MTYsMzEuNzk3NTUxNiBDNzcuODk4NjE4OCwzMS43OTc1NTE2IDc5LDMyLjkxNDI3NDcgNzksMzQuMzE1MzA2NCBDNzksMzUuNjk0Njg3NCA3Ny44OTg2MTg4LDM2LjgxMDg0MDggNzYuNTE3MDcxNiwzNi44MTA4NDA4IEM3NS4xNTcwNzU2LDM2LjgxMDg0MDggNzQuMDU1Njk0MywzNS42OTQ2ODc0IDc0LjA1NTY5NDMsMzQuMzE1MzA2NCBDNzQuMDU1Njk0MywzMi45MTQyNzQ3IDc1LjE1NzA3NTYsMzEuNzk3NTUxNiA3Ni41MTcwNzE2LDMxLjc5NzU1MTYgWiIgaWQ9IkNsaXAtMiIgZmlsbD0iIzI0Mzc3OCI+PC9wYXRoPiAgICAgICAgICAgICAgICA8cG9seWdvbiBpZD0iQ2xpcC01IiBmaWxsPSIjMjQzNzc4IiBwb2ludHM9IjEwLjMwMSAwIDE3IDE2IDEyLjY5OSAxNiA2IDAiPjwvcG9seWdvbj4gICAgICAgICAgICAgICAgPG1hc2sgaWQ9Im1hc2stMiIgZmlsbD0id2hpdGUiPiAgICAgICAgICAgICAgICAgICAgPHVzZSB4bGluazpocmVmPSIjcGF0aC0xIj48L3VzZT4gICAgICAgICAgICAgICAgPC9tYXNrPiAgICAgICAgICAgICAgICA8dXNlIGlkPSJDbGlwLTgiIGZpbGw9IiMyNDM3NzgiIHhsaW5rOmhyZWY9IiNwYXRoLTEiPjwvdXNlPiAgICAgICAgICAgIDwvZz4gICAgICAgIDwvZz4gICAgPC9nPjwvc3ZnPg==">
    </header>
    <footer style="position: fixed;bottom: -8rem;left: 0px;height: 156px;">
        <img style="width: 100%; opacity: 1" src="http://s3-ap-southeast-1.amazonaws.com/antigrvty/footer.png" alt="">
    </footer>
    @else
    <header
        style="opacity: 0; position: fixed; top: -12rem;left: 0px;height: 20px; width: 100%;padding: 5rem 6rem 0 6rem; margin-bottom: 6rem">
        <img style="width: 100%"
            src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz48c3ZnIHdpZHRoPSI0NTBweCIgaGVpZ2h0PSIzN3B4IiB2aWV3Qm94PSIwIDAgNDUwIDM3IiB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPiAgICAgICAgPHRpdGxlPmhlYWRlcjwvdGl0bGU+ICAgIDxkZXNjPkNyZWF0ZWQgd2l0aCBTa2V0Y2guPC9kZXNjPiAgICA8ZGVmcz4gICAgICAgIDxwb2x5Z29uIGlkPSJwYXRoLTEiIHBvaW50cz0iNC41IDkgOCAxNiAxIDE2Ij48L3BvbHlnb24+ICAgIDwvZGVmcz4gICAgPGcgaWQ9IlBhZ2UtMSIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0iZXZlbm9kZCI+ICAgICAgICA8ZyBpZD0iaGVhZGVyIj4gICAgICAgICAgICA8ZyBpZD0ibG9nby1jb2xvciIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoNDIxLjAwMDAwMCwgNC4wMDAwMDApIiBmaWxsPSIjMjQzNzc4Ij4gICAgICAgICAgICAgICAgPGcgaWQ9IkxvZ28tQ29weSI+ICAgICAgICAgICAgICAgICAgICA8cGF0aCBkPSJNNy45MDkwOTA5MSwwIEwxNi4xNTUwMTYyLDAgTDI5LDI5IEwyMC43NTQwNzQ3LDI5IEw3LjkwOTA5MDkxLDAgWiBNNi41ODk0MTk2MiwxNS44MTgxODE4IEwxMy4xODE4MTgyLDI5IEwwLDI5IEw2LjU4OTQxOTYyLDE1LjgxODE4MTggWiIgaWQ9IkNvbWJpbmVkLVNoYXBlIj48L3BhdGg+ICAgICAgICAgICAgICAgIDwvZz4gICAgICAgICAgICA8L2c+ICAgICAgICAgICAgPGcgaWQ9IkFudGlncmF2aXR5LWJsdWUiPiAgICAgICAgICAgICAgICA8cGF0aCBkPSJNOC4zNzA3NzUzNiwzNyBMNi45MTkxMTQ1NiwzNyBDMy4wMzk3MDk5NywzNi42MTk0NTM1IDAsMzMuMTA4NzAzNCAwLDI4LjgyNzQwOTkgQzAsMjQuMjcyNzc0OSAzLjIyMTkwODc0LDIwLjYwMTgzMjUgNy42MTk0OTM3NCwyMC42MDE4MzI1IEMxMC4zNjcyNzU0LDIwLjYwMTgzMjUgMTIuMjgxMzY0OSwyMS42Mzk5MjkyIDEzLjY0NjQ2NTEsMjMuMzExNTk1MyBMMTEuMzE0OTYyNCwyNS45MDYyNjczIEMxMC40MDUyNzM3LDI0LjQyNjYwOTIgOS4yMTE0NDksMjMuODY5Mzg3MSA3LjgyNzYzMzI0LDIzLjg2OTM4NzEgQzUuNjI5NDA3ODgsMjMuODY5Mzg3MSAzLjg0NzQ2MTUyLDI2LjA3OTQ3MzQgMy44NDc0NjE1MiwyOC44Mjc0MDk5IEMzLjg0NzQ2MTUyLDMxLjUxODM3MDggNS42Mjk0MDc4OCwzMy43MDkwODUzIDcuODI3NjMzMjQsMzMuNzA5MDg1MyBDOS41MzM1ODMxNiwzMy43MDkwODUzIDExLjIyMDI1MDQsMzIuNTk0NjQxMiAxMS4yMjAyNTA0LDMwLjY1MzQ4MDEgTDcuNjE5NDkzNzQsMzAuNjUzNDgwMSBMNy42MTk0OTM3NCwyNy44NjY4MDAxIEwxNC44NDAyODk3LDI3Ljg2NjgwMDEgTDE0Ljg0MDI4OTcsMzEuMzA2OTkxMSBDMTQuMDU2NjEwNSwzNC45OTc0NTE5IDExLjIwOTExNzMsMzYuNzQxMDU1OCA4LjM3MDc3NTM2LDM3IFogTTUxLjM4ODkwNTYsMCBMNTEuMzg4OTA1NiwxNS44NTU3NTkyIEw0Ny44MjU1ODAxLDE1Ljg1NTc1OTIgTDQ3LjgyNTU4MDEsMCBMNTEuMzg4OTA1NiwwIFogTTQ1LjIxODQ0ODUsMCBMNDUuMjE4NDQ4NSwzLjE3MTI2NTc4IEw0MS41MDM2OTcyLDMuMTcxMjY1NzggTDQxLjUwMzY5NzIsMTUuODU1NzU5MiBMMzcuOTQwMzcxNiwxNS44NTU3NTkyIEwzNy45NDAzNzE2LDMuMTcxMjY1NzggTDM0LjIyNTYyMDMsMy4xNzEyNjU3OCBMMzQuMjI1NjIwMywwIEw0NS4yMTg0NDg1LDAgWiBNMzIuNTI4MTc3NCwwIEwzMi41MjgxNzc0LDE1Ljg1NTc1OTIgTDI4Ljk2NDg1MTgsMTUuODU1NzU5MiBMMjIuNzEwNDU4Myw2LjAxNTQ5MTIyIEwyMi43MTA0NTgzLDE1Ljg1NTc1OTIgTDE5LjE0NzY5OTksMTUuODU1NzU5MiBMMTkuMTQ3Njk5OSwwIEwyMi43MTA0NTgzLDAgTDI4Ljk2NDg1MTgsOS44NDAyNjc5NCBMMjguOTY0ODUxOCwwIEwzMi41MjgxNzc0LDAgWiBNMTcuNzMxNTU3MywyMC44OTAxMjk0IEwyMy4zMjI5NjY5LDIwLjg5MDEyOTQgQzI2LjIyMjc0MTUsMjAuODkwMTI5NCAyOC40MjA5NjY5LDIyLjQ4NTQ0ODEgMjguNDIwOTY2OSwyNS41OTg1OTg3IEMyOC40MjA5NjY5LDI3Ljk4MTg5MSAyNy4xMzI0MzAyLDI5LjU3NzIwOTcgMjUuMjE4MzQwOCwzMC4xOTE5NzcyIEwzMC42MDA0NzY3LDM2Ljc0NTg4ODUgTDI2LjA3MDc0ODYsMzYuNzQ1ODg4NSBMMjEuMjk0ODgyOCwzMC40ODAyNzQxIEwyMS4yOTQ4ODI4LDM2Ljc0NTg4ODUgTDE3LjczMTU1NzMsMzYuNzQ1ODg4NSBMMTcuNzMxNTU3MywyMC44OTAxMjk0IFogTTIxLjI5NDg4MjgsMjcuOTI0MzQ1NSBMMjEuNzExNzI5LDI3LjkyNDM0NTUgQzIzLjA1NzU0NjUsMjcuOTI0MzQ1NSAyNC42Njg3ODQ1LDI3LjgyODA1NjcgMjQuNjY4Nzg0NSwyNS44NDg3MjE5IEMyNC42Njg3ODQ1LDIzLjg2OTM4NzEgMjMuMDU3NTQ2NSwyMy43NzMwOTgyIDIxLjcxMTcyOSwyMy43NzMwOTgyIEwyMS4yOTQ4ODI4LDIzLjc3MzA5ODIgTDIxLjI5NDg4MjgsMjcuOTI0MzQ1NSBaIE0zNS4wNjI3MTU0LDM2Ljc0NTg4ODUgTDI4LjUwNDkwMzIsMjAuODkwMTI5NCBMMzIuNTIzMDczMiwyMC44OTAxMjk0IEwzNi40NjUyNDY3LDMxLjMwNjk5MTEgTDQwLjQwNzQyMDIsMjAuODkwMTI5NCBMNDQuNDI1MDIzLDIwLjg5MDEyOTQgTDM3Ljg2Nzc3OCwzNi43NDU4ODg1IEwzNS4wNjI3MTU0LDM2Ljc0NTg4ODUgWiBNNDYuNTA2NDE4LDI0LjA2MTM5NTEgTDQ2LjUwNjQxOCwyMC44OTAxMjk0IEw1Ny40OTkyNDYyLDIwLjg5MDEyOTQgTDU3LjQ5OTI0NjIsMjQuMDYxMzk1MSBMNTMuNzg0NDk0OSwyNC4wNjEzOTUxIEw1My43ODQ0OTQ5LDM2Ljc0NTg4ODUgTDUwLjIyMTE2OTMsMzYuNzQ1ODg4NSBMNTAuMjIxMTY5MywyNC4wNjEzOTUxIEw0Ni41MDY0MTgsMjQuMDYxMzk1MSBaIE01OC40MDA5OTUsMjAuODkwMTI5NCBMNjIuNjg0MDE4MiwyMC44OTAxMjk0IEw2NS45NDM5MjUyLDI1Ljk2MzgxMjggTDY5LjIwMzgzMjEsMjAuODkwMTI5NCBMNzMuNDg3NDIyNSwyMC44OTAxMjk0IEw2Ny43MjUzMDQ0LDI5LjYzNDc1NTIgTDY3LjcyNTMwNDQsMzYuNzQ1ODg4NSBMNjQuMTYyNTQ1OSwzNi43NDU4ODg1IEw2NC4xNjI1NDU5LDI5LjYzNDc1NTIgTDU4LjQwMDk5NSwyMC44OTAxMjk0IFogTTc2LjUxNzA3MTYsMzEuNzk3NTUxNiBDNzcuODk4NjE4OCwzMS43OTc1NTE2IDc5LDMyLjkxNDI3NDcgNzksMzQuMzE1MzA2NCBDNzksMzUuNjk0Njg3NCA3Ny44OTg2MTg4LDM2LjgxMDg0MDggNzYuNTE3MDcxNiwzNi44MTA4NDA4IEM3NS4xNTcwNzU2LDM2LjgxMDg0MDggNzQuMDU1Njk0MywzNS42OTQ2ODc0IDc0LjA1NTY5NDMsMzQuMzE1MzA2NCBDNzQuMDU1Njk0MywzMi45MTQyNzQ3IDc1LjE1NzA3NTYsMzEuNzk3NTUxNiA3Ni41MTcwNzE2LDMxLjc5NzU1MTYgWiIgaWQ9IkNsaXAtMiIgZmlsbD0iIzI0Mzc3OCI+PC9wYXRoPiAgICAgICAgICAgICAgICA8cG9seWdvbiBpZD0iQ2xpcC01IiBmaWxsPSIjMjQzNzc4IiBwb2ludHM9IjEwLjMwMSAwIDE3IDE2IDEyLjY5OSAxNiA2IDAiPjwvcG9seWdvbj4gICAgICAgICAgICAgICAgPG1hc2sgaWQ9Im1hc2stMiIgZmlsbD0id2hpdGUiPiAgICAgICAgICAgICAgICAgICAgPHVzZSB4bGluazpocmVmPSIjcGF0aC0xIj48L3VzZT4gICAgICAgICAgICAgICAgPC9tYXNrPiAgICAgICAgICAgICAgICA8dXNlIGlkPSJDbGlwLTgiIGZpbGw9IiMyNDM3NzgiIHhsaW5rOmhyZWY9IiNwYXRoLTEiPjwvdXNlPiAgICAgICAgICAgIDwvZz4gICAgICAgIDwvZz4gICAgPC9nPjwvc3ZnPg==">
    </header>
    <footer style="position: fixed;bottom: -8rem;left: 0px;height: 156px;">
        <img style="width: 100%; opacity: 0" src="http://s3-ap-southeast-1.amazonaws.com/antigrvty/footer.png" alt="">
    </footer>
    @endif

    <div class="wadah">
        <div class="judul">KONTRAK PERJANJIAN MAGANG</div>
        <div class="no-surat mb-5">(Nomor : {{ $no_surat }} )</div>

        <div class="mb-2">
            Perjanjian Magang ini (untuk selanjutnya disebut “Perjanjian”) dibuat dan ditandatangani pada Hari
            {{ $hari }}, Tanggal {{ $tgl }} ({{ $tgl_teks }})
            Bulan {{ $bulan }}
            Tahun {{ $tahun }} ({{ $tahun_teks }}), oleh dan antara:
        </div>
        <ol>
            <li><span class="bld">PT Gravita Driatama Sentosa</span>, suatu perusahaan yang
                didirikan dan tunduk pada hukum Negara
                Republik Indonesia dan beralamat kantor di OFFICE 7 Floor 18-A Jl. Jend. Sudirman Kav 52-53 (SCBD),
                Jakarta, Indonesia, 12190, yang dalam hal ini diwakili oleh <span class="section">{{ $pihak_pertama }}
                    selaku <span class="section">{{ $jab_pihak_pertama }}
                        dari PT Gravita Driatama Sentosa, oleh dan karenanya berdasarkan anggaran dasar PT Gravita
                        Driatama Sentosa sah bertindak untuk dan atas nama PT Gravita Driatama Sentosa (untuk
                        selanjutnya disebut sebagai <span class="bld">“Pihak Pertama”</span>).
            </li>
            <li>
                <span class="bld">{{ $pihak_kedua }}</span>, seorang warga negara Republik Indonesia dengan
                Nomor KTP {{ $ktp }}
                dan berkedudukan di {{ $alamat }}
                (selanjutnya disebut sebagai <span class="bld">”Pihak Kedua”</span>); dan
            </li>
        </ol>


        <div class="mb-2">
            <span class="bld">Pihak Pertama</span> dan <span class="bld">Pihak Kedua</span> (untuk selanjutnya secara
            bersama-sama disebut <span class="bld">“Para Pihak”</span> dan secara
            sendiri-sendiri disebut <span class="bld">“Pihak”</span>) dengan ketentuan sebagaimana pasal-pasal tersebut
            di bawah ini :
        </div>

        <div class="pasal">Pasal 1</div>
        <div class="sub-pasal">Jabatan dan Penugasan</div>

        <ol>
            <li>Perusahaan dengan ini menunjuk dan menugaskan <span class="bld">Pihak Kedua</span> di PT. Gravita
                Driatama Sentosa
                sebagai web developer</li>
            <li>Apabila dibutuhkan, <span class="bld">Pihak Kedua</span> dapat ditugaskan, baik sementara maupun tetap,
                di bagian lain
                dalam lingkungan perusahaan</li>
            <li>Dalam melaksanakan tugas, <span class="bld">Pihak Kedua</span> bertanggung jawab kepada
                {{ $wakil_pihak_pertama }}
                sebagai {{ $jab_wakil_pihak_pertama }}.
                </li>
        </ol>

        <div class="pasal">Pasal 2</div>
        <div class="sub-pasal">Kompensasi & Sistem Pembayaran</div>

        <ol>
            <li>Atas penugasan yang diberikan kepada <span class="bld">Pihak Kedua</span>, <span class="bld">Pihak
                    Pertama</span> akan memberikan kompensasi
                berupa; <br> upah: Rp {{ $nominal }},- per bulan</li>
            <li>Kompensasi <span class="bld">Pihak Kedua</span> sebagaimana dimaksud dalam Pasal ini akan dibayarkan
                pada tanggal 25
                setiap bulannya dimulai untuk pembayaran pertama pada bulan <span class="bld">{{ $mulai_bayar }}</span> ke rekening
                sebagai berikut: <br>
                <table>
                    <tr>
                        <td>Nama Bank </td>
                        <td>: {{ $bank }}</td>
                    </tr>
                    <tr>
                        <td>Atas Nama </td>
                        <td>: {{ $nasabah }}</td>
                    </tr>
                    <tr>
                        <td>No. Rekening </td>
                        <td>: {{ $norek }}</td>
                    </tr>
                </table>
            </li>

            <li>Kompensasi karyawan adalah bersifat pribadi dan rahasia antara <span class="bld">Pihak Kedua</span> dan
                <span class="bld">Pihak Pertrama</span>.
                Apabila terjadi kebocoran informasi baik sengaja/tidak sengaja yang dilakukan oleh <span
                    class="bld">Pihak Kedua</span>,
                maka <span class="bld">Pihak Pertama</span> berhak untuk memberikan sanksi</li>
        </ol>

        <div class="pasal">Pasal 3</div>
        <div class="sub-pasal">Jangka Waktu Perjanjian</div>

        <ol>
            <li>
                Perjanjian ini terhitung mulai tanggal <span class="bld">{{ $tgl_mulai }}</span> dan berakhir demi
                hukum pada tanggal <span class="bld">{{ $tgl_selesai }}</span> tanpa ada kewajiban dari <span class="bld">Pihak Pertama</span> untuk mengganti kerugian dalam bentuk
                apapun.
            </li>
            <li>
                Jika <span class="bld">Pihak Pertama</span> masih memerlukan jasa dari <span class="bld">Pihak
                    Kedua</span> & disetujui oleh <span class="bld">Pihak Kedua</span>, maka
                <span class="bld">Perjanjian</span> ini akan diperpanjang sesuai dengan kebutuhan; dan akan diatur dalam lembar
                tambahan dari <span class="bld">Perjanjian</span> ini yang kekuatan hukumnya sama pengan <span class="bld">Perjanjian</span> ini
            </li>
            <li>
                Apabila ada perpanjangan kontrak dan atau penambahan pekerjaan, perjanjian ini hanya perlu
                dilakukan adendum
            </li>
        </ol>

        <div class="pasal">Pasal 4</div>
        <div class="sub-pasal">Tugas dan Kewajiban</div>

        <ol>
            <li>
                Menjaga nama baik dan reputasi <span class="bld">Pihak Pertama</span>
            </li>
            <li>
                Melakukan kewajiban dan fungsinya serta menjalankan tugas yang diberikan dan dipercayakan oleh
                Perusahaan kepada <span class="bld">Pihak Kedua</span> secara konsisten
            </li>
            <li>
                Memberikan informasi yang dibutuhkan kepada Perusahaan dan selalu mengimplementasikan serta
                menjalankan kewajiban Perusahaan yang diterapkan oleh Perusahaan
            </li>
            <li>
                Mematuhi hüküm dan peraturan yang berlaku di Indonesia, Peraturan Perusahaan dan kebijakan
                Perusahaan yang telah diterapkan.
            </li>
        </ol>


        <div class="pasal">Pasal 5</div>
        <div class="sub-pasal">Kerahasiaan dan hak atas kekayaan intelektual</div>

        <ol>
            <li>
                <span class="bld">Pihak Kedua</span> wajib untuk tidak menyebarkan seluruh informasi internal perusahaan
            </li>
            <li>
                <span class="bld">Pihak Kedua</span> dilarang untuk menggunakan nama, logo dan lambang perusahaan untuk
                kepentingan
                pribadi dan atau kepentingan lain diluar perusahaan tanpa seijin tertulis perusahaan
            </li>
        </ol>


        <div class="pasal">Pasal 6</div>
        <div class="sub-pasal">Pernyataan dan Jaminan</div>

        <div class="mb-2">
            Masing-masing Pihak, satu dengan yang lain maupun secara bersama-sama, dengan ini menyatakan dan
            menjamin bahwa:
        </div>

        <ol>
            <li>
                Masing-masing Pihak telah membaca dan mengerti isi Perjanjian ini, dan masing-masing Pihak tidak
                mempunyai keberatan terhadap segala ketentuan yang diatur dalam Perjanjian ini termasuk setiap
                hak dan kewajiban masing-masing Pihak berdasarkan Perjanjian ini, serta akan melaksanakan setiap
                ketentuan yang diatur dalam Perjanjian ini dengan penuh itikad baik.
            </li>
            <li>
                Masing-masing Pihak dalam Perjanjian ini mempunyai kewenangan untuk menandatangani
                Perjanjian ini dan mengikat masing-masing Pihak dalam Perjanjian ini, karenanya tidak ada alasan
                bahwa Perjanjian ini tidak dapat dilaksanakan karena ketidakcakapan atau karena belum
                dipenuhinya suatu persyaratan tertentu untuk dapat menandatangani Perjanjian ini.
            </li>
            <li>
                Masing-masing Pihak memiliki kewenangan untuk membuat Perjanjian ini, dan kewajiban-kewajiban
                dalam Perjanjian ini mengikat Para Pihak secara hukum dan syarat-syarat dan ketentuan-ketentuan
                dari Perjanjian ini tidak akan menyebabkan pelanggaran terhadap perjanjian lain (cross default),
                kewajiban atau komitmen apapun dimana masing-masing Pihak dan/atau anak perusahaannya
                terikat.
            </li>
            <li>
                Dengan ditandatangani dan dilaksanakannya Perjanjian ini, masing-masing Pihak tidak melanggar
                atau tidak membuat masing-masing Pihak dalam suatu keadaan pelanggaran berdasarkan
                perjanjian dengan pihak lain dimana masing-masing Pihak terikat di dalamnya.
            </li>
            <li>
                Perjanjian ini sepenuhnya mengikat dan dapat dilaksanakan oleh Para Pihak.
            </li>
        </ol>

        <div class="pasal">Pasal 7</div>
        <div class="sub-pasal">Penyelesaian Perselisihan</div>

        <ol>
            <li>
                Perjanjian ini, penafsiran dan pelaksanaan serta segala akibat yang ditimbulkannya, diatur dan
                tunduk kepada ketentuan Hukum Indonesia.
            </li>
            <li>
                Para Pihak sepakat, jika terjadi Perselisihan yang timbul sehubungan dengan Perjanjian ini, termasuk
                namun tak terbatas pada hal-hal yang berkaitan dengan keberadaan, keberlakuan, dan
                pelaksanaan hak atau kewajiban Para Pihak, maka Para Pihak akan mengusahakan, dalam jangka
                waktu 5 (lima) hari kalender Indonesia sejak diterimanya pemberitahuan dari salah satu Pihak
                lainnya atas terjadinya Perselisihan tersebut, menyelesaikan terlebih dahulu dengan cara
                musyawarah diantara Para Pihak.
            </li>
            <li>
                Dalam hal perselisihan yang timbul tidak dapat diselesaikan secara musyawarah atau musyawarah
                tidak dapat dilaksanakan dalam jangka waktu 5 (lima) hari kalender Indonesia sejak diterimanya
                pemberitahuan sebagaimana dimaksud dalam ayat 2 (dua) Pasal ini, Para Pihak sepakat untuk
                menyelesaikan perselisihan tersebut melalui Pengadilan Negeri Jakarta Pusat di Jakarta.
            </li>
        </ol>

        <div class="pasal">Pasal 8</div>
        <div class="sub-pasal">Ketentuan-Ketentuan Lain</div>

        <ol>
            <li>
                Perjanjian ini dan segala hak dan kewajiban yang melekat dengan atau timbul dari Perjanjian ini
                tidak dapat dialihkan kepada pihak manapun tanpa persetujuan tertulis dari Para Pihak.
            </li>
            <li>
                Segela kekayaan intelektual yang dimiliki oleh masing-masing Pihak yang digunakan dalam rangka
                pelaksanaan Perjanjian ini akan tetap menjadi milik dari masing-masing Pihak.
            </li>
            <li>
                Hal-hal yang belum cukup atau belum diatur Perjanjian ini maupun setiap perubahan terhadap
                ketentuan yang diatur dalam Perjanjian ini termasuk lampiran Perjanjian, akan diatur dalam suatu
                adendum yang dibuat secara tersendiri dan ditandatangani oleh Para Pihak serta merupakan bagian
                yang tidak terpisahkan dari Perjanjian ini.
            </li>
            <li>
                Dalam hal terdapat satu atau lebih dari ketentuan Perjanjian ini yang menjadi tidak sah, batal atau
                tidak dapat dilaksanakan, ketentuan lainnya dalam Perjanjian ini tetap berlaku dan dalam hal
                demikian Para Pihak sepakat untuk menggantikan ketentuan yang tidak sah, batal atau tidak dapat
                dilaksanakan tersebut dengan ketentuan lain dengan suatu adendum.
            </li>
            <li>
                Perjanjian ini dapat ditandatangani dalam beberapa salinan (counterparts) oleh masing-masing
                Pihak dan apabila masing-masing salinan tersebut disatukan akan menjadi satu kesatuan dan
                instrumen yang utuh.
            </li>
        </ol>
        <div class="mb-5">
            Demikian Perjanjian ini dibuat dalam rangkap dua (2), masing-masing memiliki kekuatan yang sama, di atas
            kertas bermaterai cukup dan ditandatangani oleh pejabat yang berwenang untuk mewakili Para Pihak, pada
            hari dan tanggal sebagaimana yang telah disebutkan pada awal Perjanjian.
        </div>

        <table style="width: 100%">
            <tr>
                <td>
                    PT. Gravita Dritama Sentosa,
                    <div class="pihak mt-5">{{ $wakil_pihak_pertama }}</div>
                    {{ $jab_wakil_pihak_pertama }}
                </td>
                <td></td>
                <td>
                    Menyetujui
                    <div class="pihak mt-5">{{ $pihak_kedua }}</div>
                    Karyawan Magang
                </td>
            </tr>
        </table>
    </div>
</body>

</html>
