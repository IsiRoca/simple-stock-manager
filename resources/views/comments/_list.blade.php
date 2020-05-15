<h2 class="mt-2">{{ trans_choice('comments.count', $product->comments_count) }}</h2>

@include ('comments/_form')

<comment-list
    :product-id="{{ $product->id }}"
    loading-comments="@lang('comments.loading_comments')"
    data-confirm="@lang('forms.comments.delete')">
</comment-list>
