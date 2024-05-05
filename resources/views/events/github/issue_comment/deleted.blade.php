<?php
/**
 * @var $payload object
 * @var $event string
 */

$issue = $payload->issue;
?>

@if(empty($issue->pull_request))
🗑 {!! __('tg-notifier::events/github/issue_comment.deleted.title', [
            'issue' => "🦑 <a href='$issue->html_url'>{$payload->repository->full_name}#$issue->number</a>",
            'user' => "<a href='{$payload->sender->html_url}'>@{$payload->sender->login}</a>"
        ]
    ) !!}

📢 {!! __('tg-notifier::events/github/issue_comment.issue_comment_title') !!}: <code>{{ $issue->title }}</code>
@include('tg-notifier::events.shared.partials.github._assignees', compact('payload', 'event'))
@else
{{ config('telegram-git-notifier.view.ignore-message') }}
@endif
