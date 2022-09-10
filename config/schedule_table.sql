CREATE TABLE [dbo].[schedule_list] (
  [id] [int] IDENTITY(1,1) NOT NULL,
  [title] varchar(100) NOT NULL,
  [description] varchar(250) NOT NULL,
  [start_datetime] datetime NOT NULL,
  [end_datetime] datetime NOT NULL,
 CONSTRAINT [PK_schedule] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON, OPTIMIZE_FOR_SEQUENTIAL_KEY = OFF) ON [PRIMARY]
) ON [PRIMARY]
GO
