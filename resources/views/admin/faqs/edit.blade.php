@extends('layouts.admin')

@section('page-title', 'Edit FAQ')

@section('content')

<div class="admin-page-head">
    <div>
        <a href="{{ route('admin.faqs.index') }}" class="admin-back-link">
            ← {{ trans('global.back_to_list') }}
        </a>

        <h2 class="admin-page-title">Edit FAQ</h2>

        <p class="admin-page-subtitle">
            Update frequently asked question details
        </p>
    </div>
</div>

<form method="POST" action="{{ route('admin.faqs.update', $faq->id) }}">
    @csrf
    @method('PUT')

    <div class="admin-form-grid">

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-question-circle"></i>
                </div>

                <div>
                    <p class="form-card-title">FAQ Content</p>
                    <p class="form-card-subtitle">Question and answer details</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="question">Question</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-question icon"></i>

                        <input type="text"
                               name="question"
                               id="question"
                               value="{{ old('question', $faq->question) }}"
                               placeholder="What is OM Dental Clinic?"
                               class="field-input {{ $errors->has('question') ? 'error' : '' }}">
                    </div>

                    @if($errors->has('question'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('question') }}
                        </p>
                    @endif
                </div>

                <div class="field-group">
                    <label class="field-label" for="answer">Answer</label>

                    <textarea name="answer"
                              id="answer"
                              rows="7"
                              placeholder="Write FAQ answer..."
                              class="field-textarea {{ $errors->has('answer') ? 'error' : '' }}">{{ old('answer', $faq->answer) }}</textarea>

                    @if($errors->has('answer'))
                        <p class="field-error">
                            <i class="fas fa-exclamation-circle"></i>
                            {{ $errors->first('answer') }}
                        </p>
                    @endif
                </div>

            </div>
        </div>

        <div class="form-card">
            <div class="form-card-header">
                <div class="form-card-icon">
                    <i class="fas fa-sliders-h"></i>
                </div>

                <div>
                    <p class="form-card-title">FAQ Settings</p>
                    <p class="form-card-subtitle">Order, default open and visibility</p>
                </div>
            </div>

            <div class="form-card-body">

                <div class="field-group">
                    <label class="field-label" for="sort_order">Sort Order</label>

                    <div class="input-icon-wrap">
                        <i class="fas fa-sort-numeric-up icon"></i>

                        <input type="number"
                               name="sort_order"
                               id="sort_order"
                               value="{{ old('sort_order', $faq->sort_order) }}"
                               class="field-input">
                    </div>
                </div>

                <div class="field-group">
                    <label class="switch-line big">
                        <input type="checkbox"
                               name="is_open"
                               value="1"
                               {{ old('is_open', $faq->is_open) ? 'checked' : '' }}>
                        <span>Open by default</span>
                    </label>
                </div>

                <div class="field-group">
                    <label class="switch-line big">
                        <input type="checkbox"
                               name="status"
                               value="1"
                               {{ old('status', $faq->status) ? 'checked' : '' }}>
                        <span>Active on frontend</span>
                    </label>
                </div>

            </div>
        </div>

    </div>

    <div class="form-actions">
        <button type="submit" class="btn-primary">
            <i class="fas fa-check"></i>
            {{ trans('global.save') }}
        </button>

        <a href="{{ route('admin.faqs.index') }}" class="btn-ghost">
            {{ trans('global.cancel') }}
        </a>
    </div>

</form>

@endsection