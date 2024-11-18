export default function profile ()
{
    return {
        open : false,
        click ()
        {
            this.open = ! this.open
        },
        close ()
        {
            this.open = false
        }
    }
}
