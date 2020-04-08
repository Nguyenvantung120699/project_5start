@extends("admin.layout")

@section("top_content")
    <h2>FeedBack Manage</h2>

@endsection

@section("main_content")
    <hr>
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
                    <h5>FeedBack Manage</h5>
                </div>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Product Id</th>
                            <th>Rate</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Created at</th>
                            <th>Updated at</th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($feedback as $p)
                            <tr class="tr-shadow">
                                <td data-target="id" class="align-items-center align-middle">{{ $p->id }}</td>
                                <td data-target="email">{{ $p->product_id }}</td>
                                <td data-target="status">{{ $p->rate}}</td>
                                <td data-target="name">{{ $p->name }}</td>
                                <td data-target="email">{{ $p->email }}</td>
                                <td data-target="status">{{ $p->message}}</td>
                                <td data-target="email">{{ $p->created_at }}</td>
                                <td data-target="status">{{ $p->updated_at}}</td>

                            </tr>
                        @empty
                            <p>No comments yet!</p>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection