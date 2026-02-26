"use client";

import React, { useEffect, useState } from "react";
import { Card } from "react-bootstrap";

const OnTimeDelivery = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [85, 15];

  const options = {
    labels: ["Delivered", "Canceled"],
    colors: ["#37D80A", "#FF4023"],
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
      position: "left",
      fontSize: "12px",
      horizontalAlign: "bottom",
      offsetX: -25,
      offsetY: 109,
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
          <h5 className="fs-14 d-block mb-4">On-Time Delivery</h5>

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

export default OnTimeDelivery;
