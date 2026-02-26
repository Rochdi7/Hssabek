"use client";

import React, { useEffect, useState } from "react";
import { Card, Form } from "react-bootstrap";

const AttendanceAnalytics = () => {
  const [Chart, setChart] = useState();
  const [timePeriod, setTimePeriod] = useState("This Year");
  const [series, setSeries] = useState([
    {
      name: "Teachers",
      data: [500, 600, 250, 600, 200, 500, 600, 120, 250, 500, 200, 250],
    },
    {
      name: "Boys",
      data: [200, 300, 200, 400, 200, 250, 350, 120, 250, 300, 120, 200],
    },
    {
      name: "Girls",
      data: [150, 250, 200, 300, 300, 150, 200, 300, 200, 250, 400, 200],
    },
  ]);

  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const options = {
    chart: {
      stacked: true,
      toolbar: {
        show: false,
      },
      zoom: {
        enabled: true,
      },
    },
    plotOptions: {
      bar: {
        borderRadius: 10,
        horizontal: false,
        columnWidth: "20px",
        borderRadiusApplication: "end",
      },
    },
    dataLabels: {
      enabled: false,
    },
    colors: ["#605DFF", "#9CAAFF", "#DDE4FF"],
    xaxis: {
      categories:
        timePeriod === "This Year"
          ? [
              "Jan",
              "Feb",
              "Mar",
              "Apr",
              "May",
              "Jun",
              "Jul",
              "Aug",
              "Sep",
              "Oct",
              "Nov",
              "Dec",
            ]
          : timePeriod === "This Month"
          ? ["Week 1", "Week 2", "Week 3", "Week 4"]
          : ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5", "Day 6", "Day 7"],
      axisTicks: {
        show: false,
        color: "#8695AA",
      },
      axisBorder: {
        show: true,
        color: "#D5D9E2",
      },
      labels: {
        show: true,
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    yaxis: {
      tickAmount: 5,
      max: 1450,
      min: 0,
      labels: {
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
      axisBorder: {
        show: true,
        color: "#D5D9E2",
      },
      axisTicks: {
        show: false,
        color: "#ECEEF2",
      },
    },
    legend: {
      show: true,
      position: "top",
      fontSize: "12px",
      horizontalAlign: "left",
      itemMargin: {
        horizontal: 8,
        vertical: 0,
      },
      labels: {
        colors: "#64748B",
      },
      markers: {
        size: 7,
        offsetX: -2,
        offsetY: -0.5,
        shape: "diamond",
      },
    },
    fill: {
      type: "gradient",
      opacity: 1,
      gradient: {
        shade: "#605DFF",
        type: "vertical",
        shadeIntensity: 0.5,
        gradientToColors: undefined,
        inverseColors: true,
        opacityFrom: 1,
        opacityTo: 1,
        stops: [0, 50, 10],
        colorStops: [],
      },
    },
    grid: {
      show: true,
      strokeDashArray: 8,
      borderColor: "#ECF0FF",
    },
  };

  const handleTimePeriodChange = (e) => {
    const selectedPeriod = e.target.value;
    setTimePeriod(selectedPeriod);

    // You can update the series data dynamically based on the selected time period
    if (selectedPeriod === "This Year") {
      setSeries([
        {
          name: "Teachers",
          data: [500, 600, 250, 600, 200, 500, 600, 120, 250, 500, 200, 250],
        },
        {
          name: "Boys",
          data: [200, 300, 200, 400, 200, 250, 350, 120, 250, 300, 120, 200],
        },
        {
          name: "Girls",
          data: [150, 250, 200, 300, 300, 150, 200, 300, 200, 250, 400, 200],
        },
      ]);
    } else if (selectedPeriod === "This Month") {
      setSeries([
        {
          name: "Teachers",
          data: [250, 300, 200, 350],
        },
        {
          name: "Boys",
          data: [100, 150, 100, 200],
        },
        {
          name: "Girls",
          data: [75, 150, 100, 150],
        },
      ]);
    } else if (selectedPeriod === "This Week") {
      setSeries([
        {
          name: "Teachers",
          data: [100, 150, 50, 200, 100, 150, 50],
        },
        {
          name: "Boys",
          data: [50, 75, 100, 120, 50, 80, 60],
        },
        {
          name: "Girls",
          data: [50, 80, 70, 100, 100, 70, 100],
        },
      ]);
    }
  };

  return (
    <>
      <Card className="rounded-3 bg-white border-0 mb-4">
        <div className="custom-padding-30">
          <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 pb-4">
            <h3 className="mb-0">Attendance Analytics</h3>

            <Form.Select
              className="month-select form-control w-135 bg-border-color border-color bg-transparent"
              aria-label="Select Time Period"
              value={timePeriod}
              onChange={handleTimePeriodChange}
            >
              <option>This Year</option>
              <option value="This Week">This Week</option>
              <option value="This Month">This Month</option>
            </Form.Select>
          </div>

          <div style={{ margin: "-6px -1px -26px -17px" }}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="bar"
                height={336}
              />
            )}
          </div>
        </div>
      </Card>
    </>
  );
};

export default AttendanceAnalytics;
