"use client";

import React, { useEffect, useState } from "react"; 

const SalesByGender = () => {
  const [Chart, setChart] = useState();
  useEffect(() => {
    import("react-apexcharts").then((mod) => {
      setChart(() => mod.default);
    });
  }, []);

  const series = [70, 30];

  const options = {
    labels: ["Men", "Woman"],
    colors: ["#605DFF", "#AD63F6"],
    stroke: {
      width: 0,
      show: true,
      colors: ["#ffffff"],
      lineCap: "round",
    },
    legend: {
      show: false,
      position: "right",
      fontSize: "12px",
      horizontalAlign: "center",
      fontFamily: "Inter",
      fontWeight: 400,
      offsetY: 10,
      itemMargin: {
        horizontal: 0,
        vertical: 5,
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
    plotOptions: {
      pie: {
        expandOnClick: false,
        donut: {
          size: "80%",
          labels: {
            show: false,
            name: {
              color: "#64748B",
            },
            value: {
              show: false,
              color: "#000",
              fontSize: "36px",
              fontWeight: "700",
              fontFamily: "Inter",
              offsetY: 10,
              formatter: (val) => {
                return "" + val / 1 + "%";
              },
            },
            total: {
              show: false,
              color: "#64748B",
              fontSize: "14px",
              fontWeight: "400",
              fontFamily: "Inter",
            },
          },
        },
      },
    },
    dataLabels: {
      enabled: false,
    },
    tooltip: {
      enabled: true,
      y: {
        formatter: (val) => {
          return "" + val / 1 + "%";
        },
      },
    },
  };

  return (
    <>
      <div style={{ margin: "0" }}>
        {Chart && (
          <Chart options={options} series={series} type="donut" height={60} />
        )}
      </div>
    </>
  );
};

export default SalesByGender;
