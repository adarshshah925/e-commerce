@extends('layouts.app')

@section('content')
    <h1 style="text-align: center; font-family: 'Helvetica Neue', Arial, sans-serif; color: #2c3e50; margin-bottom: 20px;">
        Customers</h1>
    <table
        style="width: 100%; border-collapse: collapse; margin: 20px 0; font-family: 'Helvetica Neue', Arial, sans-serif; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);">
        <thead>
            <tr style="background-color: #34495e; color: #ecf0f1; text-align: left;">
                <th style="padding: 12px; border: 1px solid #ddd;">Name</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Email</th>
                <th style="padding: 12px; border: 1px solid #ddd;">Total Orders</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr style="background-color: {{ $loop->even ? '#f9f9f9' : '#ffffff' }};">
                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $customer->name }}</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $customer->email }}</td>
                    <td style="padding: 12px; border: 1px solid #ddd;">{{ $customer->orders_count }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div style="text-align: center; margin-top: 20px;">
        {{ $customers->links() }}
    </div>
@endsection
