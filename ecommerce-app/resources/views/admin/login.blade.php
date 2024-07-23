@extends('loginlayout')
@action('content')

<div class="container  ">
    <table width="100%" height="100%" border="0" cellspacing="0" align="center">
        <tr>
            <td align="center" valign="middle">
                <table class="table-bordered" width="350" border="0" cellpadding="3" cellspacing="3" bgcolor="#FFFFFF">
                    <tr>
                        <td height="25" colspan="2" align="left" valign="middle" bgcolor="#FF9900" class="style2">
                            <div align="center">
                                <strong>Admin Login</strong>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <div id="err" style="color: red">
                            @if(session()->has('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                        </div>
                    </tr>
                    <form action="{{ route('admin.check')}}" method="POST">
                        {!! csrf_field() !!}

                        <tr>
                            <td width="118" align="left" valign="middle" class="style1">
                                username
                            </td>
                            <td width="118" align="left" valign="middle" class="style1">
                                <input type="text" class="form-control" size="10px" id="username" placeholder="Username" name="username">
                            </td>

                        </tr>

                        <tr>
                            <td width="118" align="left" valign="middle" class="style1">
                                Password
                            </td>
                             <td width="118" align="left" valign="middle" class="style1">
                                <input type="password" class="form-control" size="10px" id="password" placeholder="Password" name="password">
                            </td>
                        </tr>

                        <tr>
                            <td colspan="2" algin="right" valign="middle" class="style1">
                                <button type="submit" class="btn btn-primary">Sign in</button>
                            </td>
                        </tr>
                    </form>
                </table>
            </td>
        </tr>
    </table>
</div>
</body>
</html>

@stop

@push('css')

<style type="text/css">
    body,td,th{
        color: #000000
    }

    .style1{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 14px;
        padding: 12px;
        line-height: 25px;
        border-radius: 4px;
        text-decoration: none;
    }

    .style2{
        font-family: Arial, Helvetica, sans-serif;
        font-size: 17px;
         padding: 12px;
        line-height: 25px;
        border-radius: 4px;
        text-decoration: none;
    }
</style>

@endpush