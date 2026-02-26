"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const SalesByCategory = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [
    {
      name: "Electronics",
      data: [50, 60, 80, 25, 10, 80],
    },
    {
      name: "Non-electronics",
      data: [20, 100, 40, 30, 80, 33],
    },
  ];

  const options = {
    chart: {
      toolbar: {
        show: false,
      },
    },
    dataLabels: {
      enabled: true,
    },
    legend: {
      position: "bottom",
      horizontalAlign: "center",
      fontWeight: 400,
      fontFamily: "Inter",
      fontSize: "12",
      offsetY: 0,
      labels: {
        colors: ["#64748B", "#64748B"],
      },
      itemMargin: {
        horizontal: 10,
        vertical: 5,
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
    plotOptions: {
      radar: {
        size: 115,
        polygons: {
          strokeColors: "#E9E9E9",
          fill: {
            colors: ["#F8F8F8", "#ffffff"],
          },
        },
      },
    },
    colors: ["#757DFF", "#FC6829"],
    tooltip: {
      y: {
        formatter: function (val) {
          return val;
        },
      },
    },
    xaxis: {
      categories: [
        "Sunday",
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
      ],
      labels: {
        style: {
          colors: "#A8A8A8",
          fontSize: "11px",
          fontFamily: "Inter",
          fontWeight: 400,
        },
      },
    },
    yaxis: {
      tickAmount: 5,
      labels: {
        formatter: function (val, i) {
          if (i % 2 === 0) {
            return val;
          } else {
            return "";
          }
        },
      },
    },
  };

  return (
    <>
      <Card className="border-0 rounded-3 bg-white p-4 mb-4">
        <h3 className="mb-4">Sales By Category</h3>

        <div style={{ margin: "-43px 0 -25px 0" }}>
          {Chart && (
            <Chart
              options={options}
              series={series}
              type="radar"
              height={400}
            />
          )}
        </div>
      </Card>
    </>
  );
};

export default SalesByCategory;
