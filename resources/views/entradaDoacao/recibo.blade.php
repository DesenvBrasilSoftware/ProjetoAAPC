<head>
    <!-- JQuery -->
    <script type="text/javascript" src="/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css"
        integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <!--        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link href="/css/jquery-confirm.min.css" rel="stylesheet">
    <link href="/css/custom/custom.css" rel="stylesheet">

    <!-- jquery-confirm.min.js -->
    <script type="text/javascript" src="/js/jquery-confirm.min.js"></script>

    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="/js/jquery.formatCurrency-1.4.0.min.js"></script>
    <title>AAPC</title>
</head>

<div class="row mt-1">
    <div align="center" class="col-6">
        <button onclick="javascript:location.href='/';" id="btnFecharImpressao" class="btn btn-danger btn-block">
            Fechar
        </button>
    </div>
    <div align="center" class="col-6">
        <button onclick="javascript:imprimeNota();" id="btnImprimeComanda" class="btn btn-primary btn-block">
            Imprimir
        </button>
    </div>
</div>

<div id="notaPDF" name="notaPDF" class="h-100" style="background-color: white">
    <body>
        <strong>
            <basefont face = "courier">
            <div id="content">
                <div id="tabela-doc">
                    <table width="100%" border="0" cellpadding="2" cellspacing="0" style="font-size: 12px">
                        <tbody>
                            <tr>
                                <td>
                                    <img src="/favicon.png" alt="">
                                </td>
                                <td width="40%" align="left">
                                    <h3>AAPC</h3>
                                    <span style="font-size: 10px">Associação de Apoio a Pessoa com Câncer</span>
                                </td>
                                <span style="font-size: 6px">CNPJ: 05.363.115/0001-64</span>
                                <td>
                                    <table width="100%" border="0" cellpadding="0" cellspacing="0"
                                        style="font-size: 8px">
                                        <tbody>
                                            <tr>
                                                <td align="center"><strong>AAPC - Associação de Apoio a Pessoa com
                                                        Câncer</strong></td>
                                            </tr>
                                            <tr>
                                                <td align="center"><strong>Rua Professora Tereza Cunha Santana,
                                                        174</strong></td>
                                            </tr>
                                            <tr>
                                                <td align="center"><strong>Bairro Cel. José Pinto - CEP,
                                                        44051-738</strong></td>
                                            </tr>
                                            <tr>
                                                <td align="center"><strong>Tel.: (75) 3223-5748 - Feira de Santana -
                                                        Bahia</strong></td>
                                            </tr>
                                            <tr>
                                                <td align="center"><strong>Email: aapcapoio@gmail.com /
                                                        www.aapc.com.br</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div>
                        <hr>
                    </div>
                    <div align="right">
                        <span><strong> RECIBO: R$
                                {{ str_replace('.', ',', $entradaDoacao->valor_doacao) }}
                            </strong></span>
                    </div>
                    <div align="left">
                        <br>
                        <span text-align='left'>Recebemos de {{ $pessoa->nome }}</span>
                        <br>
                        <span>
                            A quantia de R$
                            {{ str_replace('.', ',', $entradaDoacao->valor_doacao) }}</span>
                        <br>
                        <span>
                            Referente a _________________________________________________________________________
                            _______________________________________________________________________________________
                            _______________________________________________________________________________________
                            _______________________________________________________________________________________
                            _______________________________________________________________________________________
                        </span>
                    </div>
                    <br>
                    <div align="right">
                        <span>Feira de Santana {{ date('d/m/Y', strtotime($entradaDoacao->data)) }} </Datag></span>
                    </div>
                    <div align="center">
                        <br>
                        <span>_______________________________________________________________________________________</span>
                        <span style="font-size: 8px">AAPC - Associação de Apoio a Pessoa com Câncer</span>
                    </div>
                </div>
            </div>
    </body>
</div>

<script type="text/javascript">
    function imprimeNota() {

        var printContents = document.getElementById('notaPDF').innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

<style>
    hr {
        border-top: 1px dashed black;
    }

    #notaPDF {
        padding: 10px;

    }

    #content {
        max-width: 600px;
        max-height: 500px;
        margin: 0 auto;
        border: 1px solid black;
        padding: 10px;
        border-radius: 10px;
    }

    #tabela-doc {
        width: 100%;
    }
</style>
