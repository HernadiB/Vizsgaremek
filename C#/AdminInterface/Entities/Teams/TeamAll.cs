using System.Collections.Generic;

namespace AdminInterface.Entities.Teams
{
    public class TeamAll
    {
        public List<TeamEntity> data { get; set; }
        public TeamAll() { }
        public TeamAll(List<TeamEntity> teams)
        {
            data = teams;
        }
    }
}
