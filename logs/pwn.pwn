stock logs(string[])
{
    new query[200];
    format(query, sizeof(query), "INSERT INTO `�������� ������� � ������` (string) VALUE ('%s')",string);
    sql_query(���������� ����������� � ���� ������, query);
}
