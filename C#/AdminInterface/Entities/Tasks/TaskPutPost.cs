namespace AdminInterface.Entities.Tasks
{
    public class TaskPutPost
    {
        public string name { get; set; }
        public string description { get; set; }
        public int score { get; set; }
        public int level_id { get; set; }
        public string image { get; set; }
        public TaskPutPost() { }
        public TaskPutPost(string name, string description, int score, int level_id, string image)
        {
            this.name = name;
            this.description = description;
            this.score = score;
            this.level_id = level_id;
            this.image = image;
        }
    }
}
