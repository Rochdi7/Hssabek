"use client";

import React, { useEffect, useState } from "react";
import { Card, Form } from "react-bootstrap";

const PerformanceOverview = () => {
  const [Chart, setChart] = useState();

  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  // Function to generate random data
  const generateData = (baseval, count, yrange) => {
    let i = 0;
    const series = [];
    while (i < count) {
      const x = Math.floor(Math.random() * 750) + 1;
      const y =
        Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;
      const z = Math.floor(Math.random() * (75 - 15 + 1)) + 15;

      series.push([x, y, z]);
      baseval += 86400000;
      i++;
    }
    return series;
  };

  const series = [
    {
      name: "Social Campaigns",
      data: generateData(new Date("11 Feb 2017 GMT").getTime(), 20, {
        min: 10,
        max: 60,
      }),
    },
    {
      name: "Email Newsletter",
      data: generateData(new Date("11 Feb 2017 GMT").getTime(), 20, {
        min: 10,
        max: 60,
      }),
    },
    {
      name: "TV Campaign",
      data: generateData(new Date("11 Feb 2017 GMT").getTime(), 20, {
        min: 10,
        max: 60,
      }),
    },
    {
      name: "Google Ads",
      data: generateData(new Date("11 Feb 2017 GMT").getTime(), 20, {
        min: 10,
        max: 60,
      }),
    },
    {
      name: "Courses",
      data: generateData(new Date("11 Feb 2017 GMT").getTime(), 20, {
        min: 10,
        max: 60,
      }),
    },
    {
      name: "Radio",
      data: generateData(new Date("11 Feb 2017 GMT").getTime(), 20, {
        min: 10,
        max: 60,
      }),
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    colors: ["#757DFF", "#5DA8FF", "#BF85FB", "#1E8308", "#FE7A36", "#174EDE"],
    dataLabels: {
      enabled: false,
    },
    fill: {
      opacity: 0.8,
    },
    grid: {
      borderColor: "#ECEEF2",
    },
    xaxis: {
      tickAmount: 10,
      type: "category",
      axisTicks: {
        show: false,
        color: "#B1BBC8",
      },
      axisBorder: {
        show: false,
        color: "#B1BBC8",
      },
      labels: {
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    yaxis: {
      tickAmount: 5,
      max: 100,
      min: 0,
      max: 70,
      labels: {
        formatter: (val) => {
          return "$" + val / 1 + "K";
        },
        style: {
          colors: "#8695AA",
          fontSize: "12px",
        },
      },
    },
    legend: {
      show: true,
      position: "bottom",
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
        offsetX: -2,
        offsetY: -0.5,
        size: 7,
        shape: "square",
        radius: 5,
      },
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return "$" + val + "k";
        },
      },
    },
  };

  return (
    <Card className="bg-white border-0 rounded-3 mb-4">
      <Card.Body className="p-4">
        <div className="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3 mb-lg-30">
          <div>
            <h3 className="mb-0">Performance Overview</h3>
            <p>Currently occupied vs. available.</p>
          </div>

          <Form.Select
            className="month-select form-control w-135"
            aria-label="Default select example"
          >
            <option value="0">Today</option>
            <option value="1">Last 60 Days</option>
            <option value="2">Last 90 Days</option>
          </Form.Select>
        </div>

        <div style={{ margin: "-25px -10px -17px -17px" }}>
          {Chart && (
            <Chart
              options={options}
              series={series}
              type="bubble"
              height={340}
            />
          )}
        </div>
      </Card.Body>
    </Card>
  );
};

export default PerformanceOverview;
