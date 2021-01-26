@extends('layouts.guest')
    @section('content')
        <div class="company-content">
            <div class="bottom-bar-wrapper">
                <div class="container">
                    <form method="POST" action="{{ route('comments.update', [$company, $comment]) }}">
                        @csrf
                        @method('PUT')
                        <input type="hidden" value="{{ $company }}" name="company">
                        <div id="respond" class="comment-respond">
                            <h3 id="reply-title" class="comment-reply-title">
                                Оцените нас и напишите отзыв
                            </h3>
                            <p class="comment-form-comment"><label for="comment">Комментарий</label>
                                <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required">{{ $comment->comment }}</textarea>
                            </p>
                            @error('comment')
                                <p>{{ $message }}</p>
                            @enderror
                            <label for="rating">Ваша оценка</label>

                            <fieldset class="comments-rating">
                                <div class="rating-container">
                                    @foreach (range(1, 10) as $rating)
                                        <div class="rating-item">
                                            <input type="radio" id="rating-1" name="rating" value="{{ $rating }}" {{ $comment->rating == $rating ? 'checked' : '' }}>
                                            <label for="rating-1" class="icon-star"><i class="icon-star-solid"></i></label>
                                        </div>
                                    @endforeach
                                </div>
                            </fieldset>
                            @error('rating')
                                <p>{{ $message }}</p>
                            @enderror
                            <p class="form-submit">
                                <input name="submit" type="submit" id="submit" class="submit" value="Update Comment">
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
