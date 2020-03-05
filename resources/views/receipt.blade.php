@extends('layouts.default')

@section('maincontent')

<div class="row">
    <div class="col-sm-8 mx-auto">

        <table class="table table-primary">
            <tr>
                
                <td colspan="2">Name</td>
                <td>Quantity</td>
                <td>Price</td>
                <td>Receipt ID</td>
            </tr>
            @foreach($articles as $article)
            <tr>
                <td colspan="2">{{$article->article}}</td>
                <td>{{$article->quantity}}</td>
                <td>{{$article->cost}}</td>
                <td>{{$article->receipt_id}}</td>
            </tr>
            @endforeach
            <tr>
                <td class="text-center" colspan="3">Total cost</td>
                <td class="text-center" colspan="2">{{$receipt->totalcost}}</td>
            </tr>
        </table>
    </div>
</div>
@endsection


