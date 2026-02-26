"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const TopShippingMethods = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [45, 30, 15, 10];

  const options = {
    labels: ["Air", "Road", "Sea", "Rail"],
    colors: ["#3584FC", "#FD5812", "#605DFF", "#37D80A"],
    dataLabels: {
      enabled: true,
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
    stroke: {
      width: 1,
      show: true,
      colors: ["#ffffff"],
    },
    legend: {
      show: true,
      position: "right",
      fontSize: "12px",
      horizontalAlign: "bottom",
      offsetX: -12,
      offsetY: 0,
      itemMargin: {
        horizontal: 0,
        vertical: 4,
      },
      labels: {
        colors: "#64748B",
      },
      markers: {
        width: 9,
        height: 9,
        shape: "diamond",
        offsetX: -1,
      },
    },
  };

  return (
    <>
      <Card className="border-0 rounded-3 bg-white mb-4">
        <Card.Body className="p-4">
          <h5 className="fs-14 d-block mb-4">Top Shipping Methods</h5>

          <div style={{ margin: "-7px 0px -13px 0px" }} className="t-chart">
            {Chart && (
              <Chart
                options={options}
                series={series}
                type="pie"
                height={180}
              />
            )}
          </div>
        </Card.Body>
      </Card>
    </>
  );
};

export default TopShippingMethods;
