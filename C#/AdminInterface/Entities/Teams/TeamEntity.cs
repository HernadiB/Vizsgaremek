namespace AdminInterface.Entities.Teams
{
    public class TeamEntity
    {
        public int ID { get; set; }
        public string Name { get; set; }
        public int Score { get; set; }
        public int LeaderID { get; set; }
        public TeamEntity() { }
        public TeamEntity(int id, string name, int score, int leaderId)
        {
            ID = id;
            Name = name;
            Score = score;
            LeaderID = leaderId;
        }
    }
}
