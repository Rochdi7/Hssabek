"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const CustomerSatisfactionRate = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [85, 15];

  const options = {
    labels: ["Positive", "Negative"],
    colors: ["#9CAAFF", "#FFAA72"],
    dataLabels: {
      enabled: false,
      style: {
        fontSize: "10px",
        fontFamily: "Inter",
        colors: ["#fff"],
      },
      dropShadow: {
        enabled: true,
        top: 0,
        left: 0,
        blur: 0,
        color: "#000",
        opacity: 0,
      },
    },
    plotOptions: {
      pie: {
        expandOnClick: false,
      },
    },
    tooltip: {
      y: {
        formatter: function (val) {
          return val + "%";
        },
      },
    },
    stroke: {
      width: 1,
      show: true,
      colors: ["#ffffff"],
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
  };

  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <span className="fs-14 d-block mb-2">Customer Satisfaction Rate</span>

          <h2 className="fs-32 lh-1">88.5%</h2>

          <div style={{ margin: "-6px 0 -11px 0" }}>
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="pie"
                height={200}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default CustomerSatisfactionRate;
