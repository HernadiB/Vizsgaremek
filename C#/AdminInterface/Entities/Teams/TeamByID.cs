namespace AdminInterface.Entities.Teams
{
    public class TeamByID
    {
        public TeamEntity data { get; set; }
        public TeamByID() { }
        public TeamByID(TeamEntity team)
        {
            data = team;
        }
    }
}
