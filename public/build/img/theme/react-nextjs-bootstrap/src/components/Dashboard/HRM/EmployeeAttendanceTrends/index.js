"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";
import DateTimePickerDemo from "./DateTimePickerDemo";

const EmployeeAttendanceTrends = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Attendance",
      data: [170, 420, 300, 550, 550, 650, 820],
    },
    {
      name: "Absent",
      data: [320, 300, 650, 400, 750, 650, 600],
    },
  ];

  const options = {
    chart: {
      zoom: {
        enabled: false,
      },
      toolbar: {
        show: false,
      },
    },
    colors: ["#4936F5", "#EC1F00"],
    dataLabels: {
      enabled: false,
    },
    stroke: {
      curve: "straight", //'straight', 'smooth', 'monotoneCubic', 'stepline'
      width: [2, 2],
    },
    grid: {
      show: true,
      borderColor: "#ECEEF2",
      strokeDashArray: 10,
      xaxis: {
        lines: {
          show: false,
        },
      },
    },
    fill: {
      type: "gradient",
      gradient: {
        stops: [0, 90, 100],
        shadeIntensity: 1,
        opacityFrom: 0,
        opacityTo: 0.5,
      },
    },
    xaxis: {
      categories: ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
      axisTicks: {
        show: false,
        color: "#ECEEF2",
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
      max: 1000,
      min: 0,
      labels: {
        style: {
          colors: "#64748B",
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
      position: "bottom",
      fontSize: "12px",
      horizontalAlign: "center",
      fontFamily: "Inter",
      offsetY: 10,
      itemMargin: {
        horizontal: 8,
        vertical: 10,
      },
      labels: {
        colors: "#64748B",
      },
      markers: {
        width: 9,
        height: 9,
        offsetX: -2,
        offsetY: -0.5,
        radius: 2,
        shape: "diamond",
      },
    },
  };

  return (
    <>
      <Card className="border-0 rounded-3 bg-white mb-4">
        <div className="custom-padding-30">
          <div
            className="d-flex justify-content-between align-items-center flex-wrap gap-3"
            style={{ paddingBottom: "33px" }}
          >
            <h3 className="mb-0">Employee Attendance Trends</h3>

            <DateTimePickerDemo />
          </div>

          <ul
            className="ps-0 mb-0 list-unstyled d-flex flex-wrap justify-content-between gap-2 lh-1 employee-attendance-list"
            style={{ paddingBottom: "45px" }}
          >
            <li>
              Avg. Daily Attend: <span className="fw-semibold">320</span>
            </li>
            <li>
              High. Attend: <span className="fw-semibold">340</span> (October
              5th)
            </li>
            <li>
              Low. Attend: <span className="fw-semibold">290</span> (October
              1st)
            </li>
          </ul>

          <div style={{ margin: "-24px 13px -21px -18px" }}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="area"
                height={384}
              />
            )}
          </div>
        </div>
      </Card>
    </>
  );
};

export default EmployeeAttendanceTrends;
