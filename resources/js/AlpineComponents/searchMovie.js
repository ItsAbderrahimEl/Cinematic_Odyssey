export default function searchMovie ()
{
    return {
        isOpen : false,
        placeholder : 'Find your favorite movie...',
        movieSection : document.getElementById ('movieSection'),
        searchForMovie : document.getElementById ('searchForMovie'),
        searchValue : "",

        inBlur (event)
        {
            this.isOpen = false
            this.placeholder = 'Find your favorite movie...'
            event.target.value = ""
        },
        inFocus ()
        {
            this.placeholder = ''
            this.movieSection.innerHTML = ""

        },
        inInput ()
        {
            if (this.searchValue.length > 3)
            {
                setTimeout (() =>
                {
                    this.isOpen = true
                }, 3000)
            }
            this.movieSection.innerHTML = ""
        },
        keydown (event)
        {
            const codeActions = {
                9 : () =>
                {
                    this.$refs.searchForMovie.focus ();
                },
                27 : () =>
                {
                    this.$refs.searchForMovie.blur ();
                }
            }
            if (codeActions[ event.keyCode ])
            {
                event.preventDefault ()
                codeActions[ event.keyCode ] ();
            }
        }
    }
}
