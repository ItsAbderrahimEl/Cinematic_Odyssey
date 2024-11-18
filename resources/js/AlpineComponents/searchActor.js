export default function searchActor ()
{
    return {
        placeholder : "Looking for an actor? Start typing...",
        keydown (event)
        {
            const codeActions = {
                9 : () =>
                {
                    this.$refs.searchActor.focus ();
                },
                27 : () =>
                {
                    this.$refs.searchActor.blur ();
                }
            }
            if (codeActions[ event.keyCode ])
            {
                event.preventDefault ()
                codeActions[ event.keyCode ] ();
            }
        },
        inFocus ()
        {
            this.placeholder = "";
        },
        inBlur ()
        {
            this.placeholder = "Looking for an actor? Start typing...";
        }
    }
}
