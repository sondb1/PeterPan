<%
        '���ú���ǰ ����
        Sub ToDayGoodsSet(SG_CODE,SG_IMG,SG_URL)
            C_Goods = Request.Cookies("TodayGcode")
            C_Count = Request.Cookies("TodayGcode").count
            If C_Goods = "" OR C_Count = "" Then C_Count = 0
            If C_Count > 99 Then C_Count = 99 '100������ ������ �ǹ�
 
            For c_cnt = 1 To C_Count Step 1  ' �ߺ� ������ üũ�Ͽ� �߰� ����.
                If Request.Cookies("TodayGcode")("G" & c_cnt) = SG_CODE Then
                    Exit sub
                End If
            Next
 
            If InStr(C_Goods, "=" & SG_CODE) = 0 Then '����Ȱ� ������ �������� �迭���� 1�� �ڷ�����
                For c_cnt = C_Count To 1 Step -1
                Response.Cookies("TodayGcode")("G" & c_cnt + 1) = Request.Cookies("TodayGcode")("G" & c_cnt)
                Response.Cookies("TodayImg")("G" & c_cnt + 1) = Request.Cookies("TodayImg")("G" & c_cnt)
                Response.Cookies("TodayUrl")("G" & c_cnt + 1) = Request.Cookies("TodayUrl")("G" & c_cnt)
                Next
 
                'ù��° �迭�� �űԻ�ǰ ����
                Response.Cookies("TodayGcode")("G1") = SG_CODE
                Response.Cookies("TodayImg")("G1") = SG_IMG
                Response.Cookies("TodayUrl")("G1") = SG_URL
            End If
 
            '��� expires(����)�� �� ������ �����μ��� �����ϼ����� 1�Ϸ� ��
            NewDate = DateAdd("d", 1, Now())
            Response.Cookies("TodayGcode").expires = NewDate
            Response.Cookies("TodayGcode").path = "/"
            Response.Cookies("TodayGcode").Domain = Request.SERVERVARIABLES("SERVER_NAME")
            Response.Cookies("TodayImg").expires = NewDate
            Response.Cookies("TodayImg").path = "/"
            Response.Cookies("TodayImg").Domain = Request.SERVERVARIABLES("SERVER_NAME")
            Response.Cookies("TodayUrl").expires = NewDate
            Response.Cookies("TodayUrl").path = "/"
            Response.Cookies("TodayUrl").Domain = Request.SERVERVARIABLES("SERVER_NAME")
        End Sub
 
        ToDayGoodsSet productCode, Rs("postUrl") , Request.SERVERVARIABLES("HTTP_URL")   '�Լ�ȣ�� ��ǰ�ڵ�, ��ǰ�̹���
%>