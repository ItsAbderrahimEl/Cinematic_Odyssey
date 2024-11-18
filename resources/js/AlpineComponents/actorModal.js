export default function actorModal ()
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
