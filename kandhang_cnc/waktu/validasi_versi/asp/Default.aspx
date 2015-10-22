<%@ Page Language="C#" AutoEventWireup="true" CodeFile="Default.aspx.cs" Inherits="_Default" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <style type="text/css">
        body
        {
            margin-top: 100px;
            font-family: Arial;
            font-size: 10pt;
        }
        input, select
        {
            width: 150px;
        }
    </style>
</head>
<body>
    <form id="form1" runat="server">
    <table border="0" cellpadding="0" cellspacing="0">
        <tr>
            <td>
            </td>
            <td>
                Please fill the following Form
            </td>
        </tr>
        <tr>
            <td style="height: 40px">
            </td>
        </tr>
        <tr>
            <td>
                Name:
            </td>
            <td>
                <asp:TextBox ID="txtName" runat="server" CssClass="validate[required]" />
            </td>
        </tr>
        <tr>
            <td style="height: 40px">
            </td>
        </tr>
        <tr>
            <td>
                Email:
            </td>
            <td>
                <asp:TextBox ID="txtEmail" runat="server" CssClass="validate[required,custom[email]]" />
            </td>
        </tr>
        <tr>
            <td style="height: 40px">
            </td>
        </tr>
        <tr>
            <td>
                City:
            </td>
            <td>
                <asp:DropDownList ID="ddlCities" runat="server" CssClass="validate[required]">
                    <asp:ListItem Text="Please Select" Value="" />
                    <asp:ListItem Text="Mumbai" Value="1" />
                    <asp:ListItem Text="Delhi" Value="2" />
                    <asp:ListItem Text="Kolkatta" Value="3" />
                    <asp:ListItem Text="Chennai" Value="4" />
                </asp:DropDownList>
            </td>
        </tr>
        <tr>
            <td style="height: 40px">
            </td>
        </tr>
        <tr>
            <td>
                Password:
            </td>
            <td>
                <asp:TextBox ID="txtPassword" runat="server" TextMode="Password" CssClass="validate[required]" />
            </td>
        </tr>
        <tr>
            <td style="height: 40px">
            </td>
        </tr>
        <tr>
            <td>
                Confirm Password:
            </td>
            <td>
                <asp:TextBox ID="txtConfirmPassword" TextMode="Password" runat="server" CssClass="validate[required,equals[txtPassword]]" />
            </td>
        </tr>
        <tr>
            <td style="height: 40px">
            </td>
        </tr>
        <tr>
            <td>
                Mobile Phone Number:
            </td>
            <td>
                <asp:TextBox ID="txtPhoneNumber" runat="server" CssClass="validate[required,custom[integer],maxSize[10],minSize[10]]" />
            </td>
        </tr>
        <tr>
            <td style="height: 40px">
            </td>
        </tr>
        <tr>
            <td>
                Birth Date (dd/MM/yyyy):
            </td>
            <td>
                <asp:TextBox ID="txtBirthDate" runat="server" CssClass="validate[required,funcCall[DateFormat[]] " />
            </td>
        </tr>
        <tr>
            <td style="height: 40px">
            </td>
        </tr>
        <tr>
            <td>
            </td>
            <td>
                <asp:Button Text="Submit" runat="server" />
            </td>
        </tr>
    </table>
    </form>
    <link href="ValidationEngine.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript" src="http://cdn.ucb.org.br/Scripts/formValidator/js/languages/jquery.validationEngine-en.js"
        charset="utf-8"></script>
    <script type="text/javascript" src="http://cdn.ucb.org.br/Scripts/formValidator/js/jquery.validationEngine.js"
        charset="utf-8"></script>
    <script type="text/javascript">
        $(function () {
            $("#form1").validationEngine('attach', { promptPosition: "topRight" });
        });
    </script>
    <script type="text/javascript">
        function DateFormat(field, rules, i, options) {
            var regex = /^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$/;
            if (!regex.test(field.val())) {
                return "Please enter date in dd/MM/yyyy format."
            }
        }
    </script>
</body>
</html>
