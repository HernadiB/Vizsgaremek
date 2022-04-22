namespace AdminInterface.Entities.Teams
{
    class TeamPutPost
    {
        public string Name { get; set; }
        public TeamPutPost() { }
        public TeamPutPost(string name)
        {
            this.Name = name;
        }
    }
}
