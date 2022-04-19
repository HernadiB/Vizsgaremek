

namespace AdminInterface.Entities.Teams
{
    public class TeamPostPut
    {
        public string Name { get; set; }
        public TeamPostPut() { }
        public TeamPostPut(string name)
        {
            this.Name = name;
        }
    }
}
