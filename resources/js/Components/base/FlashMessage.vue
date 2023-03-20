<script setup></script>
<template>
    <div
        v-if="$page.props.flash.message"
        class="alert alert-success alert-dismissible"
    >
        <button
            type="button"
            class="close"
            data-dismiss="alert"
            aria-hidden="true"
        >
            ×
        </button>
        {{ $page.props.flash.message }}
    </div>
</template>
