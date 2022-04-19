namespace AdminInterface.Entities.Tasks
{
    public class TaskPutPost
    {
        public string Name { get; set; }
        public string Description { get; set; }
        public int Score { get; set; }
        public int Level { get; set; }
        public TaskPutPost() { }
        public TaskPutPost(string name, string description, int score, int level)
        {
            this.Name = name;
            this.Description = description;
            this.Score = score;
            this.Level = level;
        }
    }
}
