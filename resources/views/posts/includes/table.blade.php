
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Author</th>
                <th>Category Name</th>
                <th>
                    <a href="{{ route('post.create') }}">+ New</a>
                </th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->author }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>
                        <a href="{{ route('post.show', $post) }}">Detail</a>
                    </td>
                    <td><a href="{{ route('post.edit', $post->id) }}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('post.destroy', $post->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="pagination">
    {{ $posts ?? ''->links() }}
</div>

