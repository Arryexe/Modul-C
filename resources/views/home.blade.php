@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ask Some Question !
                    
                    <div class="text-right" style="margin-top: -25px;">
                        <a href="#">View All Question</a>
                    </div>
                </div>

                <div class="panel-body">
                    <form action="{{ url('question') }}" method="get">
                        <table>
                            <tr>
                                <td>
                                    <label for="qtitle" class="form-label">Question Title</label>
                                    <input type="text" name="qtitle" id="qtitle" class="form-control">
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label for="qcontent" class="form-label">Content (Optional)</label>
                                    <textarea name="qcontent" class="form-control" rows="5" style="width: 720px;"></textarea>
                                </td>
                            </tr>
                        </table>

                        <br>

                        <button type="submit" value="submit" class="btn btn-success btn-block">Submit Question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
