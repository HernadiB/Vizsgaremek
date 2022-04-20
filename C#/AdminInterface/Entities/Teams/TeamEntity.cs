namespace AdminInterface.Entities.Teams
{
    public class TeamEntity
    {
        public int ID { get; set; }
        public string Name { get; set; }
        public int Score { get; set; }
        public string Leader { get; set; }
        public string Description { get; set; }
        public TeamEntity() { }
        public TeamEntity(int id, string name, int score, string leader, string description)
        {
            ID = id;
            Name = name;
            Score = score;
            Leader = leader;
            Description = description;
        }
    }
}
