export default function imageModal ()
{
    return {
        isModalOpen : false,
        open ()
        {
            this.isModalOpen = ! this.isModalOpen
        },
        close ()
        {
            this.isModalOpen = false
        }
    }
}
