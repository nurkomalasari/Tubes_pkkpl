<table>
    <thead>
        <tr>
            <th>Bulan</th>
            <th>Pemasukan</th>
            <th>Pengeluaran</th>
            <th>Saldo</th>
        </tr>
    </thead>
    <tbody>
    @for ($i = 0; $i < count($data['pemasukan']); $i++)
        <tr>
            <td>{{ array_keys($data['pemasukan'])[$i] }}</td>
            <td>{{ array_values($data['pemasukan'])[$i] }}</td>
            <td>{{ array_values($data['pengeluaran'])[$i] }}</td>
            <td>{{ array_values($data['saldo'])[$i] }}</td>
        </tr>
    @endfor
    </tbody>
</table>