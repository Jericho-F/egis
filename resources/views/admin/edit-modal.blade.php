@vite('resources/sass/comment.scss')
<!-- Comment modal -->
<div class="modal fade" id="commentModal{{ $post->id }}" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="commentModalLabel">Comment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="commentForm{{ $post->id }}" class="cmtForm" action="{{ route('comment', $post->id) }}" method="POST">
                    @csrf
                    <input type="text">
                </form>
            </div>
        </div>
    </div>
</div>
@push('custom-scripts')
    @vite('resources/js/comment.js')
@endpush

