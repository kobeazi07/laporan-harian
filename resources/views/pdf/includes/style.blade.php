 <style>
     @page {
         size: A4 portrait;
         margin: 5mm;
     }

     * {
         box-sizing: border-box;
     }

     body {
         font-family: Arial, sans-serif;
         font-size: 8px;
         color: #222;
         margin: 0;
         padding: 0;
     }

     .page {
         width: 100%;
         margin: auto;
     }

     table {
         width: 100%;
         border-collapse: collapse;
     }

     th,
     td {
         border: 1px solid #777;
         padding: 3px;
     }

     /* HEADER PERUSAHAAN */
     .company-header th {
         width: 33.33%;
         height: 36px;
         text-align: center;
         vertical-align: middle;
         background: #f0f0f0;
         font-size: 8px;
     }

     .company-header strong {
         display: block;
         margin-top: 4px;
         font-size: 8px;
     }

     /* JUDUL */
     .title-header {
         margin-top: 3px;
         text-align: center;
         border: 1px solid #777;
         padding: 5px;
     }

     .title-header h2 {
         font-size: 15px;
         margin: 0 0 2px;
     }

     .title-header p {
         margin: 0;
         font-size: 9px;
     }

     /* INFORMASI */
     .info-table {
         margin-top: 3px;
     }

     .info-table td {
         height: 24px;
         padding: 3px;
     }

     .info-label {
         font-weight: bold;
         white-space: nowrap;
     }

     /* URAIAN PEKERJAAN */
     .section-title {
         background: #e9edf2;
         text-align: center;
         font-weight: bold;
     }

     .work-table {
         margin-top: 4px;
     }

     .work-table td {
         height: 15px;
         padding: 2px 4px;
         border-top: none;
         border-bottom: none;
     }

     .work-table tr:last-child td {
         border-bottom: 1px solid #777;
     }

     .work-table .number {
         width: 25px;
         font-weight: bold;
     }

     /* PERALATAN DAN MATERIAL */
     /* CONTAINER PERALATAN DAN MATERIAL */

     /* PEMBUNGKUS DUA TABEL */
     .equipment-wrapper {
         width: 100%;
         border-collapse: collapse;
         table-layout: fixed;
         margin-top: 4px;
     }

     .equipment-wrapper>tbody>tr>td {
         width: 50%;
         vertical-align: top;
         padding: 0;
         border: none;
     }

     .equipment-wrapper>tbody>tr>td:first-child {
         padding-right: 3px;
     }

     .equipment-wrapper>tbody>tr>td:last-child {
         padding-left: 3px;
     }

     /* TABEL PERALATAN DAN MATERIAL */
     .detail-table {
         width: 100%;
         border-collapse: collapse;
         table-layout: fixed;
         font-size: 8px;
         margin: 0;
     }

     /* HEADER DAN DATA */
     .detail-table th,
     .detail-table td {
         border: 1px solid #777;
         padding: 3px 4px;
         height: 21px;
         line-height: 1.2;
         vertical-align: middle;
     }

     /* HEADER */
     .detail-table th {
         background-color: #e9edf2;
         text-align: center;
         font-weight: bold;
     }

     /* NOMOR */
     .detail-table td:nth-child(1) {
         text-align: center;
         white-space: nowrap;
     }

     /* NAMA */
     .detail-table td:nth-child(2) {
         text-align: left;
     }

     /* JUMLAH */
     .detail-table td:nth-child(3) {
         text-align: center;
         white-space: nowrap;
     }

     /* BARIS KOSONG */
     .detail-table .empty-row td {
         color: transparent;
     }

     /* KENDALA DAN CATATAN */
     .notes-table {
         margin-top: 4px;
     }

     .notes-table th {
         background: #e9edf2;
         text-align: center;
         height: 20px;
         padding: 2px;
     }

     .notes-table td {
         height: 48px;
         padding: 4px;
         vertical-align: top;
     }

     /* TANGGAL */
     .location-date {
         text-align: right;
         margin-top: 20px;
         margin-bottom: 20px;
         margin-right: 5px;
     }

     /* TANDA TANGAN */
     .signature {
         margin-top: 5px;
     }

     .signature td {
         border: none;
         text-align: center;
         width: 33.33%;
         vertical-align: top;
         padding: 2px;
     }

     .signature .company {
         font-weight: bold;
         margin-top: 3px;
         min-height: 25px;
     }

     .signature .sign-space {
         height: 42px;
     }

     .signature .person {
         font-weight: bold;
         text-decoration: underline;
     }

     .signature .position {
         margin-top: 2px;
     }

     @media print {

         html,
         body {
             width: 100%;
             margin: 0;
             padding: 0;
             -webkit-print-color-adjust: exact;
             print-color-adjust: exact;
         }

         .page {
             page-break-after: avoid;
             break-after: avoid;
         }
     }
 </style>
