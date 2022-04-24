
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });


window.tagSelect = tags => {
    return {
        open: false,
        textInput: '',
        tags: tags,
        init() {
            this.tags = JSON.parse(this.$el.parentNode.getAttribute('data-tags'));
        },
        addTag(tag) {
            tag = tag.trim()
            if (tag != "" && !this.hasTag(tag)) {
                this.tags.push( tag )
            }
            this.clearSearch()
            this.$refs.textInput.focus()
            this.fireTagsUpdateEvent()
        },
        fireTagsUpdateEvent() {
            this.$el.dispatchEvent(new CustomEvent('tags-update', {
                detail: { tags: this.tags },
                bubbles: true,
            }));
        },
        hasTag(tag) {
            var tag = this.tags.find(e => {
                return e.toLowerCase() === tag.toLowerCase()
            })
            return tag != undefined
        },
        removeTag(index) {
            this.tags.splice(index, 1)
            this.fireTagsUpdateEvent()
        },
        search(q) {
            if ( q.includes(",") ) {
                q.split(",").forEach(function(val) {
                    this.addTag(val)
                }, this)
            }
            this.toggleSearch()
        },
        clearSearch() {
            this.textInput = ''
            this.toggleSearch()
        },
        toggleSearch() {
            this.open = this.textInput != ''
        }
    }
}
