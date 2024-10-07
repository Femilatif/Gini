@extends('layouts.app')
@section('content')
<h1>{{ "We are processing your payment. kindly refresh the page if payment delays" }}</h1>
<script src="https://js.paystack.co/v2/inline.js"></script>
<script >
    const transactionCode = "{{ $access_code }}"
    const popup = new PaystackPop()
    popup.resumeTransaction(transactionCode)
</script>
@endsection
