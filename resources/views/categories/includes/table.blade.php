<table class="table table-striped">
    <thead>
        <tr>
            <td>ID</td>
            <td>Category Name</td>
            <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td><a href="{{ route('category.edit', $category->id)}}" class="btn btn-primary">Edit</a></td>
                <td>
                    <form action="{{ route('category.destroy', $category->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>