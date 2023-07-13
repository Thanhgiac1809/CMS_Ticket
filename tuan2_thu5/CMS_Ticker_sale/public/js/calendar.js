let granttimeSelected = false;
let granttimeDate = null;

function toggleCalendar_granttime() {
  const customVietnameseLocale = {
    weekdays: {
      shorthand: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
      longhand: [
        "Chủ Nhật",
        "Thứ Hai",
        "Thứ Ba",
        "Thứ Tư",
        "Thứ Năm",
        "Thứ Sáu",
        "Thứ Bảy",
      ],
    },
    months: {
      shorthand: [
        "Th1",
        "Th2",
        "Th3",
        "Th4",
        "Th5",
        "Th6",
        "Th7",
        "Th8",
        "Th9",
        "Th10",
        "Th11",
        "Th12",
      ],
      longhand: [
        "Tháng 1",
        "Tháng 2",
        "Tháng 3",
        "Tháng 4",
        "Tháng 5",
        "Tháng 6",
        "Tháng 7",
        "Tháng 8",
        "Tháng 9",
        "Tháng 10",
        "Tháng 11",
        "Tháng 12",
      ],
    },
    firstDayOfWeek: 1,
  };

  const calendar = flatpickr(".dategranttime", {
    dateFormat: "d-m-Y",
    locale: customVietnameseLocale,
    minDate: "today",
    onClose: function (selectedDates, dateStr, instance) {
      granttimeDate = selectedDates[0];
      granttimeSelected = true;
    },
  });

  calendar.open();
}

function toggleCalendar_expiry() {
  if (!granttimeSelected) {
    // Granttime date not selected yet
    return;
  }

  const customVietnameseLocale = {
    weekdays: {
      shorthand: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"],
      longhand: [
        "Chủ Nhật",
        "Thứ Hai",
        "Thứ Ba",
        "Thứ Tư",
        "Thứ Năm",
        "Thứ Sáu",
        "Thứ Bảy",
      ],
    },
    months: {
      shorthand: [
        "Th1",
        "Th2",
        "Th3",
        "Th4",
        "Th5",
        "Th6",
        "Th7",
        "Th8",
        "Th9",
        "Th10",
        "Th11",
        "Th12",
      ],
      longhand: [
        "Tháng 1",
        "Tháng 2",
        "Tháng 3",
        "Tháng 4",
        "Tháng 5",
        "Tháng 6",
        "Tháng 7",
        "Tháng 8",
        "Tháng 9",
        "Tháng 10",
        "Tháng 11",
        "Tháng 12",
      ],
    },
    firstDayOfWeek: 1,
  };

  const calendar = flatpickr(".dateexpiry", {
    dateFormat: "d-m-Y",
    locale: customVietnameseLocale,
    minDate: granttimeDate,
  });

  calendar.open();
}