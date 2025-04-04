<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta name="x-apple-disable-message-reformatting">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="telephone=no" name="format-detection">
    <title></title>
    <!--[if (mso 16)]>
    <style type="text/css">
    a {
        text-decoration: none;
    }
    </style>
    <![endif]-->
    <!--[if gte mso 9]>
    <style>sup {
        font-size: 100% !important;
    }</style><![endif]-->
    <!--[if gte mso 9]>
    <xml>
    <o:OfficeDocumentSettings>
        <o:AllowPNG></o:AllowPNG>
        <o:PixelsPerInch>96</o:PixelsPerInch>
    </o:OfficeDocumentSettings>
    </xml>
    <![endif]-->
</head>

<body>
<div class="es-wrapper-color">
    <!--[if gte mso 9]>
    <v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
    <v:fill type="tile" color="#fafafa"></v:fill>
    </v:background>
    <![endif]-->
    <table cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        <tr>
            <td align="center" class="esd-block-image es-p10b"
                style="font-size: 0px;">
                <a target="_blank">
                    <img
                        src="https://q-restaurant.com/images/qr1.svg"
                        alt="Logo"
                        style="display: block; font-size: 12px;"
                        width="200" title="Logo">
                </a>
            </td>
        </tr>
        </tbody>
    </table>

    <table cellpadding="0" cellspacing="0" width="100%">
        <tbody>
        <tr>
            <td align="center" class="esd-block-text es-m-txt-c">
                <h2>Orden de compra #{{ $payment['id'] }} creada con éxito.</h2>
            </td>
        </tr>
        <tr>
            <td align="center" class="esd-block-text es-p20b">
                <p>
                    Hola, <i>{{ $user['name'] }} {{ $user['lastname'] }} {{ $user['second_lastname'] }}</i>.
                </p>
                <p>
                    Se creó una órden de compra a su nombre con los
                    siguientes datos: <br/>
                </p>

                <p>
                    <strong># de Ítems: </strong>
                    {{ $payment['quantity'] }}
                </p>
                <p>
                    <strong>Precio unitario:</strong> ${{ $payment['price'] }} (MXN)
                </p>
                <p>
                    <strong>Total: </strong> ${{ $payment['total'] }} (MXN)
                </p>
                <p>
                <p>
                    <strong>Referencia: </strong>
                    {{ $payment['preference_id'] }}
                </p>
                <p>
                    Le recordamos <strong>no cerrar las ventanas
                        emergentes</strong> hasta que su pago quede
                    liberado y la pantalla de
                    confirmación sea mostrada.
                </p>
                <p>Contacto: <strong>info@appsgorilasonline.com</strong></p>

                <p>Órden:&nbsp;<strong>#{{ $payment['id'] }}</strong>
                </p>
                <p>Fecha de
                    Creación:&nbsp;<strong>{{ $payment['created_at']}}</strong>
                </p>
                <p>Método de Pago:&nbsp;<strong>MercadoPago</strong></p>
                <p>
                    Gracias por su preferencia.
                    <br/>
                    <strong>Equipo de Q-Restaurant</strong>
                </p>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>

</html>
