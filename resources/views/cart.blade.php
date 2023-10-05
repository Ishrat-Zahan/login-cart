@extends('layouts.main')
@section('content')

<div class="container">
<table class="mt-5 table table-responsive table-striped" style="width: 100%; border-collapse: collapse;">
        <thead>
            <tr>
                <th style="color:#9b51e0 ;font-weight: bold; border-bottom: 2px solid #9b51e0; padding: 8px;">Name</th>      
                <th style="color:#9b51e0 ;font-weight: bold; border-bottom: 2px solid #9b51e0; padding: 8px;">Price</th>
                
            </tr>
        </thead>
        <tbody id="dyn_tr"></tbody>

    </table>

</div>

@endsection