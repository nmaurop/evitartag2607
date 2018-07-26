<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Tabela de Nomes - XSS Vulnerable</title>

      <!-- Styles -->
      <style>
        html, body, div, span, applet, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        a, abbr, acronym, address, big, cite, code,
        del, dfn, em, font, img, ins, kbd, q, s, samp,
        small, strike, strong, sub, sup, tt, var,
        b, u, i, center,
        dl, dt, dd, ol, ul, li,
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td {
          margin: 0;
          padding: 0;
          border: 0;
          outline: 0;
          font-size: 100%;
          vertical-align: baseline;
          background: transparent;
        }
        *{box-sizing: border-box}
        /* ---- code ---- */
        .container{
          background: linear-gradient(95deg, #21c382 0%,#22C08C 40%,#24b6c2 100%);
          width: 100%;
          min-height: 100vh;
          font-family: 'Raleway', sans-serif;
          min-width: 500px;
        }
        .container h2{
          font-family: 'Oswald', sans-serif;
          margin: 0 auto;
          color: #fff;
          font-size: 3em;
          text-align: center;
          padding: 60px 0;
        }
        .TableContainer{
          width: 80%;
          margin: 0 auto;
          min-width: 500px;
          overflow-x: auto;
        }
        .TableHolder{
          margin: 0 auto;
          width: 100%;
          text-align: left;
          color: #fff;
          cursor: default;
          border-spacing: 0;
          border-collapse: collapse;
        }
        .TableHolder tr:first-child th{
          border-bottom: 1px solid #65CEC8;
          padding: 15px 15px;
          background-color: #ffffff44;
          font-size: 1.1em;
        }
        .TableHolder tr td, .TableHolder tr:not(:first-child) th{
          padding: 12px 20px;
          position: relative;
          font-weight: normal;
        }
        .TableHolder tr:not(:first-child) th{
          transition: all 1s ease-out;
        }

        .TableHolder tr td::after, .TableHolder tr:not(first-child) th::after{
          width: 0;
          height: 2px;
          background-color: #ffffff22;
          content: " ";
          position: absolute;
          bottom: 0;
          left: 0;
          transition: width 0.1s ease-out 0.2s, height 0.2s ease 0.4s;
        }

        .TDActiv::after{
          width: calc(100% - 20px) !important;
          height: 100% !important;
        }
      </style>
    </head>
    <body>
      <div class="container">
        @if (count($nomes))
          <h2>Nomes</h2>
          <div class="TableContainer">
              <table class="TableHolder">
                  <tr>
                      <th>ID</th>
                      <th>Nome</th>
                  </tr>
                  @foreach ($nomes as $nome)
                    <tr>
                        <th>{{$nome->id}}</th>
                        <td>{!!$nome->nome!!}</td>
                    </tr>
                  @endforeach
              </table>
          </div>
        @else
          <h2>Nenhum nome no banco de dados!</h2>
        @endif
      </div>
    </body>
</html>
